<?php

namespace TrainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use UserBundle\Entity\Reservation;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="index")
     */
    public function indexAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add('depart', TextType::class)
            ->add('arrive', TextType::class)
            ->add('jour', 'text')
            ->add('choix', 'choice', array(
                'choices' => array('depart' => 'Départ', 'arrive' => 'Arrivé'),
                'expanded' => true,
                'multiple' => false
            ))
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $data = $form->getData();

            $depart = $data['depart'];
            $arrive = $data['arrive'];
            $choix = $data['choix'];
            $jour1 = new \DateTime($data['jour']);
            $jour2 = new \DateTime($data['jour']);
            $jour2->modify('+1 day');

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('TrainBundle:Trajet')
            ;


            if ($choix == "depart") {
                $listTrajets = $repository->findByGareDAndGareADepart($depart, $arrive, $jour1->format('Y-m-d'), $jour2->format('Y-m-d'));
            }
            else if ($choix == "arrive") {
                $listTrajets = $repository->findByGareDAndGareAArrive($depart, $arrive, $jour1->format('Y-m-d'), $jour2->format('Y-m-d'));
            }


            return $this->render('TrainBundle::listTrajet.html.twig', array(
                'trajets' => $listTrajets,
            ));
        }

        return $this->render('TrainBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/reservation/{idTrajet}", name="reservation")
     */
    public function itineraireAction(Request $request, $idTrajet)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('TrainBundle:Trajet');

        $trajet = $repository->findOneById($idTrajet);

        if ($trajet == null) {
            throw new NotFoundHttpException("Page not found");
        }


        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
            $form = $this->createFormBuilder()
                ->add('email', EmailType::class)
                ->add('send', SubmitType::class)
                ->getForm();
        } else {
            $form = $this->createFormBuilder()
                ->add('send', SubmitType::class)
                ->getForm();
        }
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                if ($securityContext->isGranted('IS_AUTHENTICATED_ANONYMOUSLY')) {
                    $data = $form->getData();
                    $email = $data['email'];
                    $userManager = $this->get('fos_user.user_manager');
                    $user = $userManager->findUserBy(array('email' => $email));
                } else {
                    $user = $this->getUser();
                }

                /**
                 * Verif user
                 */
                if ($user == null) {
                    $user = $userManager->createUser();
                    $user->setEmail($email);
                    $user->setUsername($email);
                    $user->setPlainPassword($email);
                    $userManager->updateUser($user);

                }

                $reservation = new Reservation();
                $reservation->setUser($user);
                $reservation->setIsPay(true);
                $reservation->setTrajet($trajet);
                $reservation->setGareArrive($trajet->getGareArrive()->getName());
                $reservation->setGareDepart($trajet->getGareDepart()->getName());
                $reservation->setTarif($trajet->getTarif());
                $reservation->setDevise($trajet->getDevise());
                $reservation->setSiege(25);

                $em = $this->getDoctrine()->getManager();
                $em->persist($reservation);
                $em->flush();

                $request->getSession()
                    ->getFlashBag()
                    ->add('success', 'Votre réservation est confirmé !');

                return $this->redirectToRoute('index');
            }


        return $this->render('TrainBundle::resa.html.twig', array(
            'trajet' => $trajet,
            'form' => $form->createView(),
        ));
    }

}

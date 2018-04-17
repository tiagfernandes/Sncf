<?php

namespace TrainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Validator\Constraints\Date;

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
     * @Route("/reservation/{idTrajet}")
     */
    public function itineraireAction($idTrajet)
    {
        $repository = $this
            ->getDoctrine()
            ->getManager()
            ->getRepository('TrainBundle:Trajet')
        ;

        $reservation = $repository->findOneById($idTrajet);
        /**
         * enregistrer la reservation avec l'user si actif, sinon demander email et creer un compte vide
         */
        return $this->render('TrainBundle::resa.html.twig');
    }

}

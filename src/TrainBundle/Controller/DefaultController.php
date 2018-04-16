<?php

namespace TrainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateType;

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
            ->add('heureDepart', 'datetime', array('widget' => 'single_text',
                'date_format' => 'yyyy-mm-dd HH:mm'))
            ->add('heureArrive', 'datetime', array('widget' => 'single_text',
                'date_format' => 'yyyy-mm-dd HH:mm'))
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();

            $depart = $data['depart'];
            $arrive = $data['arrive'];
            $heureD = $data['heureDepart']->format('Y-m-d H:i');
            $heureA = $data['heureArrive']->format('Y-m-d H:i');

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('TrainBundle:Trajet')
            ;

            $listTrajets = $repository->findByGareDAndGareA($depart, $arrive, $heureD, $heureA);

            return $this->render('TrainBundle::listTrajet.html.twig', array(
                'trajets' => $listTrajets,
            ));
        }

        return $this->render('TrainBundle:Default:index.html.twig', array(
            'form' => $form->createView(),
        ));
    }


    /**
     * @Route("/itineraire")
     */
    public function itineraireAction()
    {
        return $this->render('TrainBundle:Default:index.html.twig');
    }

}

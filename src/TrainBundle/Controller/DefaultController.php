<?php

namespace TrainBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;

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
            ->add('heureDepart', TextType::class)
            ->add('heureArrive', TextType::class)
            ->add('send', SubmitType::class)
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // data is an array with "name", "email", and "message" keys
            $data = $form->getData();

            $repository = $this
                ->getDoctrine()
                ->getManager()
                ->getRepository('TrainBundle:Trajet')
            ;

            $listTrajets = $repository->findAll();
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

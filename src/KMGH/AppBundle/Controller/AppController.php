<?php

namespace KMGH\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @Route(name="kmgh_appbundle_app_index", path="/")
     * @Template("KMGHAppBundle:App:index.html.twig")
     */
    public function indexAction()
    {
        //todo recuperer par ordre alphabetique
        $typeDiplomes = $this->getDoctrine()->getRepository("KMGHAppBundle:TypeDiplome")->findAll();
        return array(
            "typeDiplomes"=>$typeDiplomes
        );
    }

    /**
     * @Route(name="kmgh_appbundle_app_fiches", path="/FICHES-ENSEIGNEMENT")
     * @Template("KMGHAppBundle:App:fiches.html.twig")
     */
    public function fichesAction()
    {

    }
}

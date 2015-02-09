<?php

namespace KMGH\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
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
        $typeDiplomes = $this->get('kmgh_app.typediplome_manager')->findAll();
        return array(
            "typeDiplomes"=>$typeDiplomes
        );
    }

    /**
     * @Route(name="kmgh_appbundle_app_fiches", path="/fiches-enseignement")
     * @Template("KMGHAppBundle:App:fiches.html.twig")
     */
    public function fichesAction()
    {
        //to update
        $lesEnseignements = $this->getDoctrine()->getRepository("KMGHAppBundle:Enseignement")->findAll();
        return array(
            "lesEnseignements"=>$lesEnseignements
        );
    }
}

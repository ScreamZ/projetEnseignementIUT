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
        $typeDiplomes = $this->get('kmgh_app.typediplome_manager')->findAllEnhanced();
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

        $typeDiplomes = $this->get('kmgh_app.typediplome_manager')->findAllEnhanced();
        $listeDiplomes = $this->getDoctrine()->getRepository('KMGHAppBundle:Diplome')->findAll();
        $listEnseignements = $this->getDoctrine()->getRepository('KMGHAppBundle:Enseignement')->findAll();
        $listPeriodes = $this->getDoctrine()->getRepository('KMGHAppBundle:Periode')->findAll();
        return array(
            "typeDiplomes"=>$typeDiplomes,
            "listeDiplomes"=>$listeDiplomes,
            "listEnseignements"=>$listEnseignements,
            "listPeriodes"=>$listPeriodes
        );
    }
}

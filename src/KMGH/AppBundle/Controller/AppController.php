<?php

namespace KMGH\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class AppController extends Controller
{
    /**
     * @Route("/")
     * @Template("KMGHAppBundle:App:index.html.twig")
     */
    public function indexAction()
    {
        $enseignement = $this->getDoctrine()->getRepository("KMGHAppBundle:Module")->findAll();
        return array(
            "enseignement"=>$enseignement
        );
    }

    /**
     * @Route("/options")
     * @Template("KMGHAppBundle:App:options.html.twig")
     */
    public function optionsAction()
    {

    }

}

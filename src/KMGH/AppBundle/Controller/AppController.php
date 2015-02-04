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
        $diplome = $this->getDoctrine()->getRepository("KMGHAppBundle:Diplome")->findAll();
        return array(
            "diplomes"=>$diplome
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

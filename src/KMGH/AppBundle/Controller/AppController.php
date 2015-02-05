<?php

namespace KMGH\AppBundle\Controller;

use KMGH\AppBundle\Managers\EnseignementManager;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class AppController extends Controller
{
    /**
     * @Route("/")
     * @Template("KMGHAppBundle:App:index.html.twig")
     */
    public function indexAction()
    {
        $man = new EnseignementManager($this->getDoctrine()->getManager());
        var_dump($man->createEnseignement('module'));
        return new Response();

    }

    /**
     * @Route("/options")
     * @Template("KMGHAppBundle:App:options.html.twig")
     */
    public function optionsAction()
    {

    }

}

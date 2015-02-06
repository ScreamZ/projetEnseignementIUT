<?php

namespace KMGH\UserBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class UserController extends Controller
{
    /**
     * @Route(name="kmgh_userbundle_user_options", path="/options")
     * @Template("KMGHUserBundle:User:options.html.twig")
     */
    public function optionsAction()
    {
        return array();
    }
}

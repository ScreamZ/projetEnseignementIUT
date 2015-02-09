<?php

namespace KMGH\UserBundle\Controller;

use KMGH\UserBundle\Entity\Utilisateur;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class UserController extends Controller
{
    /**
     * @Route(name="kmgh_userbundle_user_options", path="/options")
     * @Template("KMGHUserBundle:User:options.html.twig")
     */
    public function optionsAction()
    {
        /**
         * @var Utilisateur $user
         */
        $user = $this->get('security.token_storage')->getToken()->getUser();
        $user->getEnseignant()->getNom();
        return array();
    }
}

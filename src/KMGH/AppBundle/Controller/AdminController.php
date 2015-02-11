<?php

namespace KMGH\AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * @Route("/admin")
 */
class AdminController extends Controller
{
    /**
     * @Route(name="kmgh_appbundle_admin_attribution", path="/attribution")
     * @Template("KMGHAppBundle:Admin:admin-attribution.html.twig")
     */
    public function attributionAction()
    {
        $attributions = $this->getDoctrine()->getRepository("KMGHAppBundle:Attribution")->findAll();
        $enseignants = $this->getDoctrine()->getRepository("KMGHUserBundle:Enseignant")->findAll();
        $enseignements = $this->getDoctrine()->getRepository("KMGHAppBundle:Enseignement")->findAll();

        return array(
            "attributions" => $attributions,
            "enseignants" => $enseignants,
            "enseignements" => $enseignements
        );
    }

    /**
     * @Route(name="kmgh_appbundle_admin_modules", path="/modules")
     * @Template("KMGHAppBundle:Admin:admin-modules.html.twig")
     */
    public function modulesAction()
    {
        $enseignements = $this->getDoctrine()->getRepository("KMGHAppBundle:Enseignement")->findAll();
        return array(
            "enseignements" => $enseignements
        );
    }

    /**
     * @Route(name="kmgh_appbundle_admin_enseignants", path="/enseignants")
     * @Template("KMGHAppBundle:admin:admin-enseignants.html.twig")
     */
    public function enseignantsAction()
    {
        $enseignants = $this->getDoctrine()->getRepository("KMGHUserBundle:Enseignant")->findAll();
        $statuts = $this->getDoctrine()->getRepository("KMGHUserBundle:Statut")->findAll();
        return array(
            "enseignants" => $enseignants,
            "statuts" => $statuts
        );
    }
}
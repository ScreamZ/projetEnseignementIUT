<?php

namespace KMGH\AppBundle\Controller;

use KMGH\AppBundle\Entity\Attribution;
use KMGH\AppBundle\Form\AttributionType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

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
        $attribution = new Attribution();
        $form = $this->createForm(new AttributionType(), $attribution);

        $form->handleRequest(Request::createFromGlobals());

        if ($form->isValid()) {
            $manager = $this->get('kmgh_app.attribution_manager');
            $manager->persist($attribution);

            $this->addFlash('success', 'Votre attribution à bien été faite');
            $this->redirectToRoute('kmgh_appbundle_admin_attribution');
        }

        $attributions = $this->getDoctrine()->getRepository("KMGHAppBundle:Attribution")->findAll();

        return array(
            "attributions" => $attributions,
            'form' => $form->createView()
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
<?php

namespace KMGH\AppBundle\Controller;

use Doctrine\DBAL\Driver\SQLSrv\SQLSrvException;
use Doctrine\DBAL\Exception\UniqueConstraintViolationException;
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
            try{
                $manager = $this->get('kmgh_app.attribution_manager');
                $manager->persist($attribution);

                $this->addFlash('notice', array(
                    'alert' => 'success',
                    'title' => 'Félicitations!',
                    'message' => 'Votre attribution à bien été enregistrée dans la base de données'
                ));
                return $this->redirectToRoute('kmgh_appbundle_admin_attribution');
            }
            catch(UniqueConstraintViolationException $e){
                $this->addFlash('notice', array(
                    'alert' => 'error',
                    'title' => 'Erreur',
                    'message' => 'L\'attribution existe déjà pour cet enseignant et cet enseignant'
                ));
            }

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
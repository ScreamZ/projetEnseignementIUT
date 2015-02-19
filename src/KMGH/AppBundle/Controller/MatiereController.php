<?php

namespace KMGH\AppBundle\Controller;
use KMGH\AppBundle\Form\MatiereType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class MatiereController
 *
 */
class MatiereController extends Controller
{

    /**
     * @Route(name="kmgh_app_matiere_fiches", path="/fiches-enseignement")
     * @Template("KMGHAppBundle:Matiere:fiches.html.twig")
     */
    public function fichesAction()
    {
        $form = $this->createForm(new MatiereType());
        return array(
            'form' => $form->createView()
        );
    }

    /**
     * @Route(name="kmgh_app_matiere_listeDiplomesAjax",path="/fiche-ajax/liste-diplomes", options={"expose"=true})
     * @Method("POST")
     */
    public function listeDiplomesAjaxAction()
    {
        $request = Request::createFromGlobals();

        if ($request->isXmlHttpRequest()) {
            $id = $request->request->get('id');
            $managerDiplome = $this->get("kmgh_app.diplome_manager");
            $lesDiplomesJson = $managerDiplome->jsonFindDiplomeByTypeDiplomeId($id);
            return new Response($lesDiplomesJson, 200, array('content-type' => 'application/json'));
        } else {
            return new Response(403, Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @Route(name="kmgh_app_matiere_listeEnseignementsAjax",path="/fiche-ajax/liste-enseignements", options={"expose"=true})
     * @Method("POST")
     */
    public function listeEnseignementsAjaxAction()
    {
        $request = Request::createFromGlobals();

        if ($request->isXmlHttpRequest()) {
            $id = $request->request->get('id');
            $managerEnseignement = $this->get("kmgh_app.enseignement_manager");
            $lesEnseignementsJson = $managerEnseignement->jsonFindEnseignementByDiplomeId($id);

            return new Response($lesEnseignementsJson, 200, array('content-type' => 'application/json'));
        } else {
            return new Response(403, Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @Route(name="kmgh_app_matiere_listePeriodesAjax",path="/fiche-ajax/liste-periodes", options={"expose"=true})
     * @Method("POST")
     */
    public function listePeriodesAjaxAction()
    {
        $request = Request::createFromGlobals();

        if ($request->isXmlHttpRequest()) {
            $id = $request->request->get('id');

            $managerPeriode = $this->get("kmgh_app.periode_manager");
            $lesPeriodesJson = $managerPeriode->jsonFindPeriodeByEnseignementId($id);

            return new Response($lesPeriodesJson, 200, array('content-type' => 'application/json'));
        } else {
            return new Response(403, Response::HTTP_FORBIDDEN);
        }
    }

    /**
     * @Route(name="kmgh_app_matiere_tableauFicheAjax",path="/fiche-ajax/tableauFiche", options={"expose"=true})
     * @Method("POST")
     */

    public function tableauAction()
    {
        $request = Request::createFromGlobals();

        if ($request->isXmlHttpRequest()) {
            $idsObjectsSelected = $request->request->get('idsObjDdata');
            $managerEnseignement = $this->get("kmgh_app.enseignement_manager");
            $lesObjetsEnseignements = $managerEnseignement->findAllByIdsSelected($idsObjectsSelected);

            return $this->render('KMGHAppBundle:Matiere:tableau.html.twig', array(
                "lesObjetsEnseignements"=> $lesObjetsEnseignements
            ));
            //return new Response($tableauHtml, 200, array('content-type' => 'text/html'));
        } else {
            return new Response(403, Response::HTTP_FORBIDDEN);
        }
    }

}

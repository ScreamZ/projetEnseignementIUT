<?php

namespace KMGH\AppBundle\Controller;

use KMGH\AppBundle\Entity\Attribution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validation;

class AttributionController extends Controller
{
    /**
     * Mise à jour d'une attribution existante
     *
     * @Route(name="kmgh_appbundle_attribution_update", path="/update/{id}")
     * @param String $id L'id de l'attribution à mettre à jour
     *
     * @return Response
     */
    public function udpateAction($id)
    {
        $request = Request::createFromGlobals();
        $nbHeuresCM = $request->request->get('cm');
        $nbHeuresTD = $request->request->get('td');
        $nbHeuresTP = $request->request->get('tp');
        $manager = $this->get('kmgh_app.attribution_manager');
        /**
         * TODO : Implements CSRF Verification
         *
         * @var Attribution $attribution
         */
        $attribution = $manager->find($id);
        if (null == $attribution) {
            return new Response(401, 401);
        }
        $attribution->setNombreHeuresCM($nbHeuresCM);
        $attribution->setNombreHeuresTD($nbHeuresTD);
        $attribution->setNombreHeuresTP($nbHeuresTP);

        $validator = Validation::createValidator();
        $errorList = $validator->validate($attribution);

        if (count($errorList) > 0) {
            return new Response(401, 401);
        } else {
            $manager->persist($attribution);

            return new Response(200, 200);
        }
    }

    /**
     * Traitement de la suppression d'une attribution existante
     *
     * @Route(name="kmgh_appbundle_attribution_delete", path="/delete/{id}")
     * @param String $id L'id de l'attribution à supprimer
     *
     * @return Response
     */
    public function deleteAction($id)
    {
        $manager = $this->get('kmgh_app.attribution_manager');
        /**
         * TODO : Implements CSRF Verification
         *
         * @var Attribution $attribution
         */
        $attribution = $manager->find($id);
        if (null != $attribution) {
            $manager->remove($attribution);

            return new Response(200, 200);
        } else {
            return new Response(401, 401);
        }

    }

    /**
     * Traitement de l'ajout d'une nouvelle attribution
     *
     * @Route(name="kmgh_appbundle_attribution_insert", path="/insert/{id}")
     *
     * @return Response
     */
    public function insertAction()
    {
        $request = Request::createFromGlobals();
        $nbHeuresCM = $request->request->get('cm', 0);
        $nbHeuresTD = $request->request->get('td', 0);
        $nbHeuresTP = $request->request->get('tp', 0);
        $manager = $this->get('kmgh_app.attribution_manager');
        /**
         * TODO : Implements CSRF Verification
         *
         * @var Attribution $attribution
         */
        $attribution = new Attribution();
        $attribution->setNombreHeuresCM($nbHeuresCM);
        $attribution->setNombreHeuresTD($nbHeuresTD);
        $attribution->setNombreHeuresTP($nbHeuresTP);

        $validator = Validation::createValidator();
        $errorList = $validator->validate($attribution);

        if (count($errorList) > 0) {
            return new Response(401, 401);
        } else {
            $manager->persist($attribution);

            return new Response($attribution->getId(), 200);
        }
    }

}

<?php

namespace KMGH\AppBundle\Controller;

use KMGH\AppBundle\Entity\Attribution;
use KMGH\AppBundle\Entity\Enseignement;
use KMGH\UserBundle\Entity\Utilisateur;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\AccessDeniedException;
use Symfony\Component\Validator\Constraints\Date;
use Symfony\Component\Validator\Validation;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AttributionController extends Controller
{
    /**
     * Mise à jour d'une attribution existante
     *
     * @Route(name="kmgh_appbundle_attribution_update", path="/update/{id}", options={"expose"=true})
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
        $csrf = $request->request->get('csrf_token');

        if (!$this->isValidatedCSRF($csrf)) {
            throw new AccessDeniedException("Jeton CSRF invalide, tentative de piratage ?");
        }

        /**
         * @var Attribution $attribution
         */
        $attribution = $manager->getRepository()->find($id);
        if (null == $attribution) {
            return new Response(401, 401);
        }
        $attribution->setNombreHeuresCM($nbHeuresCM);
        $attribution->setNombreHeuresTD($nbHeuresTD);
        $attribution->setNombreHeuresTP($nbHeuresTP);

        $validator = Validation::createValidator();
        $errorList = $validator->validate($attribution);

        if (count($errorList) > 0) {
            return new Response(401, Response::HTTP_UNAUTHORIZED);
        } else {
            $manager->persist($attribution);
            $logger = $this->get('monolog.logger.attribution');
            $logger->info("Edition d'une attribution de {attribAssignedEnseignant} (ID:{attribID}) par {enseignant}@{IP} : ", array(
                'enseignant' => $this->getUser()->getEnseignant(),
                'IP' => $request->getClientIp(),
                'attribID' => $attribution->getId(),
                'attribAssignedEnseignant' => $attribution->getEnseignant()
            ));
            return new Response(200, Response::HTTP_OK);
        }
    }

    /**
     * Valide un token csrf selon le standard défini dans l'extension twig dans le UserBundle
     *
     * @param String $token Le token transmit à comparer
     *
     * @return bool
     */
    private function isValidatedCSRF($token)
    {
        return $this->isCsrfTokenValid('projet_iut_' . $this->getUser()->getId(), $token);
    }

    /**
     * Traitement de la suppression d'une attribution existante
     *
     * @Route(name="kmgh_appbundle_attribution_delete", path="/delete/{id}", options={"expose"=true})
     * @param String $id L'id de l'attribution à supprimer
     *
     * @return Response
     */
    public function deleteAction($id)
    {
        $request = Request::createFromGlobals();
        $manager = $this->get('kmgh_app.attribution_manager');
        $csrf = $request->request->get('csrf_token');

        // TODO : check if not making issues
        if (!$this->isValidatedCSRF($csrf)) {
            throw new AccessDeniedException("Jeton CSRF invalide, tentative de piratage ?");
        }

        /**
         * @var Attribution $attribution
         * FIXME : L'id transmi via l'interface d'administration n'est pas le bon.
         */
        $attribution = $manager->getRepository()->find($id);

        if (null != $attribution) {
            $attributionID = $attribution->getId();
            $attribAssignedEnseignant = $attribution->getEnseignant();
            $manager->remove($attribution);

            // FIXME : Faille de sécurité on ne teste pas l'utilisateur courant, a voir si c'est vraiment utile sachant qu'on pronne une politique de confiance
            $logger = $this->get('monolog.logger.attribution');
            $logger->info("Supression d'une attribution de {attribAssignedEnseignant} (ID:{attribID}) par {enseignant}@{IP} : ", array(
                'enseignant' => $this->getUser()->getEnseignant(),
                'IP' => $request->getClientIp(),
                'attribID' => $attributionID,
                'attribAssignedEnseignant' => $attribAssignedEnseignant
            ));
            return new Response(200, 200);
        } else {
            return new Response(401, 401);
        }

    }

    /**
     * Traitement de l'ajout d'une nouvelle attribution
     *
     * @Route(name="kmgh_appbundle_attribution_insert", path="/insert/", options={"expose"=true})
     *
     * @return Response
     */
    public function insertAction()
    {
        $request = Request::createFromGlobals();
        $nbHeuresCM = $request->request->get('cm', 0);
        $nbHeuresTD = $request->request->get('td', 0);
        $nbHeuresTP = $request->request->get('tp', 0);
        $userId = $request->request->get('userId');
        $enseignementId = $request->request->get('enseignementId');
        $manager = $this->get('kmgh_app.attribution_manager');

        $csrf = $request->request->get('csrf_token');

        if (!$this->isValidatedCSRF($csrf)) {
            throw new AccessDeniedException("Jeton CSRF invalide, tentative de piratage ?");
        }

        /**
         * @var Attribution $attribution
         * @var Utilisateur $user
         */
        $attribution = new Attribution();
        $attribution->setAnnee(new \DateTime());
        $user = $this->get('fos_user.user_manager')->findUserBy(array('id' => $userId));
        $attribution->setEnseignant($user->getEnseignant());
        $attribution->setEnseignement($this->get('kmgh_app.enseignement_manager')->getRepository()->find($enseignementId));
        $attribution->setNombreHeuresCM($nbHeuresCM);
        $attribution->setNombreHeuresTD($nbHeuresTD);
        $attribution->setNombreHeuresTP($nbHeuresTP);

        $validator = Validation::createValidator();
        $errorList = $validator->validate($attribution);

        if (count($errorList) > 0) {
            return new Response('ERROR', 401);
        } else {
            $manager->persist($attribution);
            $logger = $this->get('monolog.logger.attribution');
            $logger->info("Création d'une attribution pour {attribAssignedEnseignant} (ID:{attribID}) par {enseignant}@{IP} : ", array(
                'enseignant' => $user->getEnseignant(),
                'IP' => $request->getClientIp(),
                'attribID' => $attribution->getId(),
                'attribAssignedEnseignant' => $attribution->getEnseignant()
            ));
            return new Response($attribution->getId(), 200);
        }
    }

}

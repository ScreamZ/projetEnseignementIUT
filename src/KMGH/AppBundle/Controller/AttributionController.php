<?php

namespace KMGH\AppBundle\Controller;

use KMGH\AppBundle\Entity\Attribution;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Validator\Validation;

class AttributionController extends Controller
{
    /**
     * @Route(name="kmgh_appbundle_attribution_update", path="/update/{id}")
     * @param String $id id de l'attribution
     *
     * @return array
     */
    public function udpateAction($id)
    {
        $request = Request::createFromGlobals();
        $nbHeuresCM = $request->request->get('cm');
        $nbHeuresTD = $request->request->get('td');
        $nbHeuresTP = $request->request->get('tp');
        $manager = $this->get('kmgh_app.attribution_manager');
        /**
         * @var Attribution $attribution
         */
        $attribution = $manager->find($id);
        $attribution->setNombreHeuresCM($nbHeuresCM);
        $attribution->setNombreHeuresTD($nbHeuresTD);
        $attribution->setNombreHeuresTP($nbHeuresTP);

        $validator = Validation::createValidator();
        $errorList = $validator->validate($attribution);

        if (count($errorList) > 0) {
            return new Response(401, 401);
        } else {
            $manager->persistAndFlush($attribution);

            return new Response(200, 200);
        }
    }

    /**
     * @Route(name="kmgh_appbundle_attribution_delete", path="/delete/{id}")
     * @param String $id id de l'attribution
     *
     * @return array
     */
    public function deleteAction($id)
    {
        return array(// ...
        );
    }

    /**
     * @Route(name="kmgh_appbundle_attribution_insert", path="/insert/{id}")
     * @param String $id id de l'attribution
     *
     * @return array
     */
    public function insertAction($id)
    {
        return array(// ...
        );
    }

}

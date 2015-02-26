<?php

namespace KMGH\AppBundle\Controller;

use KMGH\AppBundle\Entity\Module;
use KMGH\AppBundle\Entity\TypeDiplome;
use KMGH\AppBundle\Form\CreateModuleType;
use KMGH\AppBundle\Form\DeleteTypeDiplomeType;
use KMGH\AppBundle\Form\TypeDiplomeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class CRUDController extends Controller
{
    /**
     * @Route(name="kmgh_app_crud_createtypediplome", path="/create/typediplome")
     * @Template("KMGHAppBundle:CRUD:createTypeDiplome.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createTypeDiplomeAction()
    {
        $request = Request::createFromGlobals();
        $typeDiplome = new TypeDiplome();

        $form = $this->createForm(new TypeDiplomeType, $typeDiplome);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->get('kmgh_app.typediplome_manager');
            $manager->persist($typeDiplome);

            $this->addFlash(
                'notice',
                array(
                    'alert' => 'success',
                    'title' => 'Félicitations',
                    'message' => 'Le type de diplôme «' . $typeDiplome->getNom() . '» à bien été créer'
                )
            );

            return $this->redirectToRoute('kmgh_app_crud_createtypediplome');
        }

        return array('form' => $form->createView());
    }

    /**
     * @Route(name="kmgh_app_crud_deletetypediplome", path="/supprimer/typediplome")
     * @Template("KMGHAppBundle:CRUD:deleteTypeDiplome.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteTypeDiplomeAction()
    {
        $request = Request::createFromGlobals();
        $typeDiplome = $request->request->get("kmgh_appbundle_type_diplome_supprimer");
        if (null != $typeDiplome) {
            $diplomeManager = $this->get('kmgh_app.typediplome_manager');
            $typeDiplome = $diplomeManager->getRepository()->find($typeDiplome['typediplome']);

            $diplomeManager->remove($typeDiplome);
            $this->addFlash(
                'notice',
                array(
                    'alert' => 'success',
                    'title' => 'Félicitations',
                    'message' => 'Le type de diplôme «' . $typeDiplome->getNom(
                        ) . '» à bien été supprimé ainsi que ses attributions liées'
                )
            );

            return $this->redirectToRoute('kmgh_app_crud_deletetypediplome');
        }

        $form = $this->createForm(new DeleteTypeDiplomeType());

        return array('form' => $form->createView());
    }

    /**
     * @Route(name="kmgh_app_crud_createmodule", path="/create/module")
     * @Template("KMGHAppBundle:CRUD:createModule.html.twig")
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function createModuleAction()
    {
        $request = Request::createFromGlobals();
        /**
         * @var Module $module
         */
        $module = $this->get('kmgh_app.enseignement_manager')->createEnseignement('module');

        $form = $this->createForm(new CreateModuleType, $module);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $manager = $this->get('kmgh_app.enseignement_manager');
            $manager->persist($module);

            $this->addFlash(
                'notice',
                array(
                    'alert' => 'success',
                    'title' => 'Félicitations',
                    'message' => 'Le module «' . $module->getDenomination() . '» à bien été créer'
                )
            );

            return $this->redirectToRoute('kmgh_app_crud_createmodule');
        }

        return array('form' => $form->createView());
    }

    public function deleteModuleAction()
    {
        $request = Request::createFromGlobals();
    }
}
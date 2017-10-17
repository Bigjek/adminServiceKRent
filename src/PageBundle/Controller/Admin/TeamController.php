<?php

namespace PageBundle\Controller\Admin;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use PageBundle\Entity\Team;
use PageBundle\Form\TeamType;

/**
 * page controller.
 *
 * @Route("/team")
 */
class TeamController extends Controller
{

    /**
     * Lists all page entities.
     *
     * @Route("/", name="team_page")
     * @Method("GET")
     * @Template()
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('PageBundle:Team')->findAll();

        return $this->render('PageBundle:Admin/Team:index.html.twig', array(
            'entities' => $entities,
        ));

    }
    /**
     * Creates a new page entity.
     *
     * @Route("/", name="team_page_create")
     * @Method("POST")
     * @Template("PageBundle:team:new.html.twig")
     */
    public function createAction(Request $request)
    {
        $entity = new Team();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('team_page'));
        }

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }

    /**
     * Creates a form to create a page entity.
     *
     * @param page $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Team $entity)
    {
        $form = $this->createForm(new TeamType(), $entity, array(
            'action' => $this->generateUrl('team_page_create'),
            'method' => 'POST',
        ));

        return $form;
    }

    /**
     * Displays a form to create a new page entity.
     *
     * @Route("/new", name="team_page_new")
     * @Method("GET")
     * @Template()
     */
    public function newAction()
    {
        $entity = new Team();
        $form   = $this->createCreateForm($entity);

        return array(
            'entity' => $entity,
            'form'   => $form->createView(),
        );
    }


    /**
     * Displays a form to edit an existing page entity.
     *
     * @Route("/{id}/edit", name="team_page_edit")
     * @Method("GET")
     * @Template()
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PageBundle:Team')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find page entity.');
        }

        $editForm = $this->createEditForm($entity);


        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),

        );
    }

    /**
    * Creates a form to edit a page entity.
    *
    * @param page $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(Team $entity)
    {
        $form = $this->createForm(new TeamType(), $entity, array(
            'action' => $this->generateUrl('team_page_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        return $form;
    }
    /**
     * Edits an existing page entity.
     *
     * @Route("/{id}", name="team_page_update")
     * @Method("PUT")
     * @Template("PageBundle:team:edit.html.twig")
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('PageBundle:Team')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find page entity.');
        }


        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('team_page_edit', array('id' => $id)));
        }

        return array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
        );
    }
    /**
     * Deletes a page entity.
     *
     * @Route("/{id}/{confirm}", name="team_page_delete")
     *
     */
    public function deleteAction(Request $request, $id, $confirm = false)
    {
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('PageBundle:Team')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find page entity.');
        }


        if($confirm)
        {
            $em->remove($entity);
            $em->flush();
            return $this->redirect($this->generateUrl('team_page'));
        }
        return $this->render('PageBundle:Admin/Team:delete.html.twig', array(
            'entity' => $entity,
        ));

    }
}

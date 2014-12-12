<?php

namespace App\NotationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\NotationBundle\Entity\StudentClass;
use App\NotationBundle\Form\StudentClassType;

/**
 * StudentClass controller.
 *
 */
class StudentClassController extends Controller
{

    /**
     * Lists all StudentClass entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppNotationBundle:StudentClass')->findAll();

        return $this->render('AppNotationBundle:StudentClass:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new StudentClass entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new StudentClass();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('studentClass_show', array('id' => $entity->getId())));
        }

        return $this->render('AppNotationBundle:StudentClass:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a StudentClass entity.
     *
     * @param StudentClass $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(StudentClass $entity)
    {
        $form = $this->createForm(new StudentClassType(), $entity, array(
            'action' => $this->generateUrl('studentClass_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new StudentClass entity.
     *
     */
    public function newAction()
    {
        $entity = new StudentClass();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppNotationBundle:StudentClass:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StudentClass entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:StudentClass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClass entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppNotationBundle:StudentClass:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StudentClass entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:StudentClass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClass entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppNotationBundle:StudentClass:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a StudentClass entity.
    *
    * @param StudentClass $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(StudentClass $entity)
    {
        $form = $this->createForm(new StudentClassType(), $entity, array(
            'action' => $this->generateUrl('studentClass_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing StudentClass entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:StudentClass')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClass entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('studentClass_edit', array('id' => $id)));
        }

        return $this->render('AppNotationBundle:StudentClass:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a StudentClass entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppNotationBundle:StudentClass')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find StudentClass entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('studentClass'));
    }

    /**
     * Creates a form to delete a StudentClass entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentClass_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

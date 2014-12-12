<?php

namespace App\NotationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\NotationBundle\Entity\StudentClassCourse;
use App\NotationBundle\Form\StudentClassCourseType;

/**
 * StudentClassCourse controller.
 *
 */
class StudentClassCourseController extends Controller
{

    /**
     * Lists all StudentClassCourse entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppNotationBundle:StudentClassCourse')->findAll();

        return $this->render('AppNotationBundle:StudentClassCourse:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new StudentClassCourse entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new StudentClassCourse();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('studentClassCourse_show', array('id' => $entity->getId())));
        }

        return $this->render('AppNotationBundle:StudentClassCourse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a StudentClassCourse entity.
     *
     * @param StudentClassCourse $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(StudentClassCourse $entity)
    {
        $form = $this->createForm(new StudentClassCourseType(), $entity, array(
            'action' => $this->generateUrl('studentClassCourse_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new StudentClassCourse entity.
     *
     */
    public function newAction()
    {
        $entity = new StudentClassCourse();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppNotationBundle:StudentClassCourse:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a StudentClassCourse entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:StudentClassCourse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClassCourse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppNotationBundle:StudentClassCourse:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing StudentClassCourse entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:StudentClassCourse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClassCourse entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppNotationBundle:StudentClassCourse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a StudentClassCourse entity.
    *
    * @param StudentClassCourse $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(StudentClassCourse $entity)
    {
        $form = $this->createForm(new StudentClassCourseType(), $entity, array(
            'action' => $this->generateUrl('studentClassCourse_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing StudentClassCourse entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:StudentClassCourse')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find StudentClassCourse entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('studentClassCourse_edit', array('id' => $id)));
        }

        return $this->render('AppNotationBundle:StudentClassCourse:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a StudentClassCourse entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppNotationBundle:StudentClassCourse')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find StudentClassCourse entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('studentClassCourse'));
    }

    /**
     * Creates a form to delete a StudentClassCourse entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('studentClassCourse_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

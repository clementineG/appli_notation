<?php

namespace App\NotationBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use App\NotationBundle\Entity\ExaminationSession;
use App\NotationBundle\Form\ExaminationSessionType;

/**
 * ExaminationSession controller.
 *
 */
class ExaminationSessionController extends Controller
{

    /**
     * Lists all ExaminationSession entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('AppNotationBundle:ExaminationSession')->findAll();

        return $this->render('AppNotationBundle:ExaminationSession:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ExaminationSession entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ExaminationSession();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('examinationSession_show', array('id' => $entity->getId())));
        }

        return $this->render('AppNotationBundle:ExaminationSession:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ExaminationSession entity.
     *
     * @param ExaminationSession $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ExaminationSession $entity)
    {
        $form = $this->createForm(new ExaminationSessionType(), $entity, array(
            'action' => $this->generateUrl('examinationSession_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ExaminationSession entity.
     *
     */
    public function newAction()
    {
        $entity = new ExaminationSession();
        $form   = $this->createCreateForm($entity);

        return $this->render('AppNotationBundle:ExaminationSession:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ExaminationSession entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:ExaminationSession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ExaminationSession entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppNotationBundle:ExaminationSession:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing ExaminationSession entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:ExaminationSession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ExaminationSession entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('AppNotationBundle:ExaminationSession:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ExaminationSession entity.
    *
    * @param ExaminationSession $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ExaminationSession $entity)
    {
        $form = $this->createForm(new ExaminationSessionType(), $entity, array(
            'action' => $this->generateUrl('examinationSession_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ExaminationSession entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('AppNotationBundle:ExaminationSession')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ExaminationSession entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('examinationSession_edit', array('id' => $id)));
        }

        return $this->render('AppNotationBundle:ExaminationSession:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ExaminationSession entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('AppNotationBundle:ExaminationSession')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ExaminationSession entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('examinationSession'));
    }

    /**
     * Creates a form to delete a ExaminationSession entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('examinationSession_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
}

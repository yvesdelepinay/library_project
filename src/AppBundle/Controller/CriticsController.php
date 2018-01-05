<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Critics;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Critic controller.
 *
 * @Route("critics")
 */
class CriticsController extends Controller
{
    /**
     * Lists all critic entities.
     *
     * @Route("/", name="critics_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $critics = $em->getRepository('AppBundle:Critics')->findAll();

        return $this->render('critics/index.html.twig', array(
            'critics' => $critics,
        ));
    }

    /**
     * Creates a new critic entity.
     *
     * @Route("/new", name="critics_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $critic = new Critic();
        $form = $this->createForm('AppBundle\Form\CriticsType', $critic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($critic);
            $em->flush();

            return $this->redirectToRoute('critics_show', array('id' => $critic->getId()));
        }

        return $this->render('critics/new.html.twig', array(
            'critic' => $critic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a critic entity.
     *
     * @Route("/{id}", name="critics_show")
     * @Method("GET")
     */
    public function showAction(Critics $critic)
    {
        $deleteForm = $this->createDeleteForm($critic);

        return $this->render('critics/show.html.twig', array(
            'critic' => $critic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing critic entity.
     *
     * @Route("/{id}/edit", name="critics_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Critics $critic)
    {
        $deleteForm = $this->createDeleteForm($critic);
        $editForm = $this->createForm('AppBundle\Form\CriticsType', $critic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('critics_edit', array('id' => $critic->getId()));
        }

        return $this->render('critics/edit.html.twig', array(
            'critic' => $critic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a critic entity.
     *
     * @Route("/{id}", name="critics_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Critics $critic)
    {
        $form = $this->createDeleteForm($critic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($critic);
            $em->flush();
        }

        return $this->redirectToRoute('critics_index');
    }

    /**
     * Creates a form to delete a critic entity.
     *
     * @param Critics $critic The critic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Critics $critic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('critics_delete', array('id' => $critic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

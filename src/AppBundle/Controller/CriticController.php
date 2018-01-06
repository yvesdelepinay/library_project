<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Critic;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * Critic controller.
 *
 * @Route("critic")
 */
class CriticController extends Controller
{
    /**
     * Lists all critic entities.
     *
     * @Route("/", name="critic_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $critics = $em->getRepository('AppBundle:Critic')->findAll();

        return $this->render('critic/index.html.twig', array(
            'critics' => $critics,
        ));
    }

    /**
     * Creates a new critic entity.
     *
     * @Route("/new", name="critic_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $critic = new Critic();
        $form = $this->createForm('AppBundle\Form\CriticType', $critic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($critic);
            $em->flush();

            return $this->redirectToRoute('critic_show', array('id' => $critic->getId()));
        }

        return $this->render('critic/new.html.twig', array(
            'critic' => $critic,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a critic entity.
     *
     * @Route("/{id}", name="critic_show")
     * @Method("GET")
     */
    public function showAction(Critic $critic)
    {
        $deleteForm = $this->createDeleteForm($critic);

        return $this->render('critic/show.html.twig', array(
            'critic' => $critic,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing critic entity.
     *
     * @Route("/{id}/edit", name="critic_edit")
     * @Method({"GET", "POST"})
     */
    public function editAction(Request $request, Critic $critic)
    {
        $deleteForm = $this->createDeleteForm($critic);
        $editForm = $this->createForm('AppBundle\Form\CriticType', $critic);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('critic_edit', array('id' => $critic->getId()));
        }

        return $this->render('critic/edit.html.twig', array(
            'critic' => $critic,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a critic entity.
     *
     * @Route("/{id}", name="critic_delete")
     * @Method("DELETE")
     */
    public function deleteAction(Request $request, Critic $critic)
    {
        $form = $this->createDeleteForm($critic);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($critic);
            $em->flush();
        }

        return $this->redirectToRoute('critic_index');
    }

    /**
     * Creates a form to delete a critic entity.
     *
     * @param Critic $critic The critic entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Critic $critic)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('critic_delete', array('id' => $critic->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}

<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Review;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;use Symfony\Component\HttpFoundation\Request;

/**
 * User controller.
 *
 * @Route("review")
 */
class ReviewController extends Controller
{
    /**
     * Lists all review entities.
     *
     * @Route("/", name="review_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reviews = $em->getRepository('AppBundle:Review')->findAll();

        return $this->render('review/index.html.twig', array(
            'reviews' => $reviews,
        ));
    }

    /**
     * Creates a new review entity.
     *
     * @Route("/new", name="review_new")
     * @Method({"GET", "POST"})
     */
    public function newAction(Request $request)
    {
        $review = new Review();

        return $this->render('review/new.html.twig', array(
            'review' => $review,
        ));
    }

    /**
     * Finds and displays a review entity.
     *
     * @Route("/{id}", name="review_show")
     * @Method("GET")
     */
    public function showAction(review $review)
    {
        $deleteForm = $this->createDeleteForm($review);

        return $this->render('review/show.html.twig', array(
            'review' => $review,
            'delete_form' => $deleteForm->createView(),
        ));
    }
}
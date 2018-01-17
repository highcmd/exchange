<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exchange;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;

/**
 * Exchange controller.
 *
 * @Route("history")
 */
class ExchangeController extends Controller
{
    /**
     * Lists all exchange entities.
     *
     * @Route("/", name="history_index")
     * @Method("GET")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $exchanges = $em->getRepository('AppBundle:Exchange')->findAll();

        return $this->render('exchange/index.html.twig', array(
            'exchanges' => $exchanges,
        ));
    }

    /**
     * Finds and displays a exchange entity.
     *
     * @Route("/{id}", name="history_show")
     * @Method("GET")
     */
    public function showAction(Exchange $exchange)
    {

        return $this->render('exchange/show.html.twig', array(
            'exchange' => $exchange,
        ));
    }
}

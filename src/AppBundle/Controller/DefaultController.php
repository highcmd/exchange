<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Exchange;
use AppBundle\Form\ExchangeType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use AppBundle\Utils\Exchanger;


class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $exchange = new Exchange();
        $form = $this->createForm(ExchangeType::class, $exchange);
        $form->handleRequest($request);

        if ($form->isValid()) {

            $code = Exchanger::getCurrencyByCapital($form->get('city')->getData());
            $currency = Exchanger::convertCurrency($form->get('amount')->getData(), $code);
            $exchange->setDate(new \DateTime('now'));
            $exchange->setForeginCurrency(Exchanger::getCurrencyByCapital($form->get('city')->getData()));
            $exchange->setAmountAfterExchange($currency);

            $em = $this->getDoctrine()->getManager();
            $em->persist($exchange);
            $em->flush();
            $this->addFlash('notice', 'Dodano!');
        }


        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')) . DIRECTORY_SEPARATOR,
            'form' => $form->createView(),
            'exchange' => isset($currency) ? $currency : null,
            'message' => isset($code) ? $code : null

        ]);
    }


}

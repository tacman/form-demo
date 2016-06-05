<?php

namespace AppBundle\Controller;

use AppBundle\Model\Numbers;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class NumbersController extends Controller
{
    /**
     * @Feb\Route("/numbers", name="numbers")
     * @param Request $request
     * @return Response
     */
    public function numbersAction(Request $request)
    {
        $numbers = new Numbers();
        $numbers->numbers[] = 5;

        $form = $this->createForm('numbers', $numbers);

        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->render('AppBundle:Numbers:success.html.twig', array(
                'numbers' => $numbers,
            ));
        }

        return $this->render('AppBundle:Numbers:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

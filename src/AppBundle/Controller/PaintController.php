<?php

namespace AppBundle\Controller;

use AppBundle\Model\Paints;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class PaintController extends Controller
{
    /**
     * @Feb\Route("/paint", name="paint")
     * @param Request $request
     * @return Response
     */
    public function paintAction(Request $request)
    {
        $paints = new Paints;
        $paints->paints[] = array('color' => 'white', 'finish' => 'high_gloss');

        $form = $this->createForm('paints', $paints);

        $form->handleRequest($request);

        if ($form->isValid()) {
            return $this->render('AppBundle:Paints:success.html.twig', array(
                'paints' => $paints,
            ));
        }

        return $this->render('AppBundle:Paints:form.html.twig', array(
            'form' => $form->createView(),
        ));
    }
}

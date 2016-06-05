<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Feb\Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $salesmen = $this->getDoctrine()->getRepository('E:Salesman')->findBy([], ['name' => 'ASC']);

        return $this->render('AppBundle::dashboard.html.twig', array(
            'salesmen' => $salesmen,
        ));
    }
}

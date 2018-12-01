<?php

namespace App\Controller;

use App\Entity\Salesman;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function indexAction(Request $request)
    {
        $salesmen = $this->getDoctrine()->getRepository(Salesman::class)->findBy([], ['name' => 'ASC']);

        return $this->render('dashboard.html.twig', ['salesmen' => $salesmen,
        ]
        );
    }
}

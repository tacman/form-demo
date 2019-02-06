<?php

namespace App\Controller;

use App\Entity\Appliance;
use App\Form\Type\ApplianceType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ApplianceController extends AbstractController
{
    /**
     * @Route("/appliance/", name="appliance_list")
     * @return Response
     */
    public function listAction()
    {
        return $this->render('Appliance/list.html.twig', [
            'appliances' => $this->getDoctrine()->getRepository(Appliance::class)->findAll(),
        ]);
    }

    /**
     * @Route("/appliance/add", name="appliance_add")
     * @param Request $request
     * @return Response
     */
    public function addAction(Request $request)
    {
        $appliance = new Appliance;
        $form = $this->createForm(ApplianceType::class, $appliance);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($appliance);
            $em->flush();

            return $this->redirectToRoute('appliance_list');
        }

        return $this->render('Appliance/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/appliance/{id}/edit", name="appliance_edit", requirements={"id" = "\d+"})
     * @Feb\ParamConverter("appliance", converter="doctrine.orm")
     * @param Appliance $appliance
     * @param Request $request
     * @return Response
     */
    public function editAction(Request $request, Appliance $appliance)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(ApplianceType::class, $appliance);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($appliance);
            $em->flush();

            return $this->redirectToRoute('appliance_list');
        }

        $em->refresh($appliance); // Makes the page title accurate. (But only safe if Appliance::$manual doesn't cascade refresh)

        return $this->render('Appliance/edit.html.twig', [
            'appliance' => $appliance,
            'form' => $form->createView(),
        ]);
    }
}

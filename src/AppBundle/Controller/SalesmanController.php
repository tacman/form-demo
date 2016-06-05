<?php

namespace AppBundle\Controller;

use Doctrine\ORM\EntityManager;
use Entity\Area;
use Entity\Product;
use Entity\Salesman;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Security\Core\Util\StringUtils;

class SalesmanController extends Controller
{
    /**
     * @Feb\Route("/salesman/add", name="salesman_add")
     * @param Request $request
     * @return Response
     */
    public function addSalesmanAction(Request $request)
    {
        return $this->editSalesmanAction(new Salesman, $request);
    }

    /**
     * @Feb\ParamConverter
     * @Feb\Route("/salesman/{id}/edit", name="salesman_edit", requirements={"id" = "\d+"})
     * @param Salesman $salesman
     * @param Request  $request
     * @return Response
     */
    public function editSalesmanAction(Salesman $salesman, Request $request)
    {
        // Verify that some products and areas are defined.
        // This is for demonstration purposes and not part of the normal code path.
        $firstProduct = $this->getDoctrine()->getRepository('E:Product')->findOneBy([]);
        $firstArea = $this->getDoctrine()->getRepository('E:Area')->findOneBy([]);

        if (null === $firstProduct || null === $firstArea) {
            $this->addFlash('product_or_area_not_defined', '');
        }

        $form = $this->createForm('salesman', $salesman);

        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salesman);
            $em->flush();

            $this->addFlash('success', 'Salesman saved.');

            return $this->redirectToRoute('home');
        }

        return $this->render('AppBundle:Salesman:edit.html.twig', array(
            'form' => $form->createView(),
            'salesman' => $salesman,
        ));
    }

    /**
     * @Feb\Route("/salesman/setup", name="salesman_setup")
     * @return Response
     */
    public function loadDefaultsAction(Request $request)
    {
        $expectedToken = $this->get('security.csrf.token_manager')->getToken('salesman_setup');

        if (!StringUtils::equals($expectedToken, $request->request->get('_token'))) {
            throw new InvalidCsrfTokenException();
        }

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->executeUpdate(sprintf('DELETE FROM %s', $em->getClassMetadata('E:Product')->getTableName()));
        $em->getConnection()->executeUpdate(sprintf('DELETE FROM %s', $em->getClassMetadata('E:Area')->getTableName()));

        foreach (['Chair', 'Desk', 'Table'] as $productName) {
            $em->persist($product = new Product);
            $product->setName($productName);
            $product->setCost(100);
            $product->setSellPrice(150);
        }

        foreach (['North side', 'East side', 'Inner north', 'Inner south'] as $areaName) {
            $em->persist($area = new Area());
            $area->setName($areaName);
        }

        $em->flush();

        return $this->redirect($request->headers->get('referer', $this->generateUrl('home')));
    }
}

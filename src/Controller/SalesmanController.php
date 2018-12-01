<?php

namespace App\Controller;

use App\Form\Type\SalesmanType;
use Doctrine\ORM\EntityManager;
use App\Entity\Area;
use App\Entity\Product;
use App\Entity\Salesman;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Exception\InvalidCsrfTokenException;
use Symfony\Component\Routing\Annotation\Route;

class SalesmanController extends AbstractController
{
    /**
     * @Route("/salesman/add", name="salesman_add")
     * @param Request $request
     * @return Response
     */
    public function addSalesmanAction(Request $request)
    {
        return $this->editSalesmanAction(new Salesman, $request);
    }

    /**
     * @Feb\ParamConverter
     * @Route("/salesman/{id}/edit", name="salesman_edit", requirements={"id" = "\d+"})
     * @param Salesman $salesman
     * @param Request  $request
     * @return Response
     */
    public function editSalesmanAction(Salesman $salesman, Request $request)
    {
        // Verify that some products and areas are defined.
        // This is for demonstration purposes and not part of the normal code path.
        $firstProduct = $this->getDoctrine()->getRepository(Product::class)->findOneBy([]);
        $firstArea = $this->getDoctrine()->getRepository(Area::class)->findOneBy([]);

        if (null === $firstProduct || null === $firstArea) {
            $this->addFlash('product_or_area_not_defined', '');
        }

        $form = $this->createForm(SalesmanType::class, $salesman);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($salesman);
            $em->flush();

            $this->addFlash('success', 'Salesman saved.');

            return $this->redirectToRoute('home');
        }

        return $this->render('Salesman/edit.html.twig', [
            'form' => $form->createView(),
            'salesman' => $salesman,
        ]);
    }

    /**
     * @Route("/salesman/setup", name="salesman_setup")
     * @return Response
     */
    public function loadDefaultsAction(Request $request)
    {
        $expectedToken = $this->get('security.csrf.token_manager')->getToken('salesman_setup')->getValue();

        if (!hash_equals($expectedToken, $request->request->get('_token'))) {
            throw new InvalidCsrfTokenException();
        }

        /** @var EntityManager $em */
        $em = $this->getDoctrine()->getManager();
        $em->getConnection()->executeUpdate(sprintf('DELETE FROM %s', $em->getClassMetadata(Product::class)->getTableName()));
        $em->getConnection()->executeUpdate(sprintf('DELETE FROM %s', $em->getClassMetadata(Area::class)->getTableName()));

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

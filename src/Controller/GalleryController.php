<?php

namespace App\Controller;

use App\Entity\Gallery;
use App\Form\Type\GalleryType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration as Feb;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GalleryController extends AbstractController
{
    /**
     * @Route("/gallery/", name="gallery_list")
     * @return Response
     */
    public function listAction()
    {
        return $this->render('Gallery/list.html.twig', [
            'galleries' => $this->getDoctrine()->getRepository(Gallery::class)->findAll(),
        ]);
    }

    /**
     * @Route("/gallery/add", name="gallery_add")
     * @param Request $request
     * @return Response
     */
    public function addAction(Request $request)
    {
        $gallery = new Gallery;
        $form = $this->createForm(GalleryType::class, $gallery);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($gallery);
            $em->flush();

            return $this->redirectToRoute('gallery_list');
        }

        return $this->render('Gallery/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/gallery/{id}/edit", name="gallery_edit", requirements={"id" = "\d+"})
     * @Feb\ParamConverter("gallery", converter="doctrine.orm")
     * @param Gallery $gallery
     * @param Request $request
     * @return Response
     */
    public function editAction(Request $request, Gallery $gallery)
    {
        $em = $this->getDoctrine()->getManager();
        $form = $this->createForm(GalleryType::class, $gallery);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em->persist($gallery);
            $em->flush();

            return $this->redirectToRoute('gallery_list');
        }

        $em->refresh($gallery);

        return $this->render('Gallery/edit.html.twig', [
            'gallery' => $gallery,
            'form' => $form->createView(),
        ]);
    }
}

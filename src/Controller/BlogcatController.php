<?php

namespace App\Controller;

use App\Entity\Blogcat;
use App\Form\BlogcatType;
use App\Repository\BlogcatRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/blogcat")
 */
class BlogcatController extends AbstractController
{
    /**
     * @Route("/", name="blogcat_index", methods={"GET"})
     */
    public function index(BlogcatRepository $blogcatRepository): Response
    {
        return $this->render('blogcat/index.html.twig', [
            'blogcats' => $blogcatRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="blogcat_new", methods={"GET","POST"})
     */
    public function new(Request $request): Response
    {
        $blogcat = new Blogcat();
        $form = $this->createForm(BlogcatType::class, $blogcat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($blogcat);
            $entityManager->flush();

            return $this->redirectToRoute('blogcat_index');
        }

        return $this->render('blogcat/new.html.twig', [
            'blogcat' => $blogcat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blogcat_show", methods={"GET"})
     */
    public function show(Blogcat $blogcat): Response
    {
        return $this->render('blogcat/show.html.twig', [
            'blogcat' => $blogcat,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="blogcat_edit", methods={"GET","POST"})
     */
    public function edit(Request $request, Blogcat $blogcat): Response
    {
        $form = $this->createForm(BlogcatType::class, $blogcat);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('blogcat_index');
        }

        return $this->render('blogcat/edit.html.twig', [
            'blogcat' => $blogcat,
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/{id}", name="blogcat_delete", methods={"DELETE"})
     */
    public function delete(Request $request, Blogcat $blogcat): Response
    {
        if ($this->isCsrfTokenValid('delete'.$blogcat->getId(), $request->request->get('_token'))) {
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->remove($blogcat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('blogcat_index');
    }
}

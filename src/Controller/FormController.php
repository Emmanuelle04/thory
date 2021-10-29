<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Form\ArticleType;
use App\Entity\Article;

class FormController extends AbstractController
{
    /**
     * @Route("/form/new", name="form")
     */

    public function new(Request $request)
    {
        $article = new Article();

        // $article->setTitle('Hello World');
        // $article->setContent('Un très court article.');
        // $article->setAuthor('Zozor');

        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();

            $em->persist($article);
            $em->flush();

            dump($article);
        }

        return $this->render('form/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/form/edit/{id<\d+>}")
     */
    public function edit(Request $request, Article $article)
    {
        $form = $this->createForm(ArticleType::class, $article);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('form/index.html.twig', array(
            'form' => $form->createView(),
        ));
    }

    /**
     * @Route("/form/delete/{id<\d+>}", methods={"POST"})
     */
    public function delete(Request $request, Article $article)
    {
        $em = $this->getDoctrine()->getManager();

        $em->remove($article);
        $em->flush();

        return $this->redirectToRoute('form/index.html.twig');
    }
}

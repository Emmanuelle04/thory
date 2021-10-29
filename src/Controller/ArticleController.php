<?php

namespace App\Controller;

use App\Entity\Article;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;

class ArticleController extends AbstractController
{
    /**
     * @Route("/article", name="article")
     * 
     * @IsGranted("EDIT", subject="article")
     */
    public function edit(Article $article)
    {
        if (!$this->isGranted('EDIT', $article)) {
            throw $this->createAccessDeniedException();
        }
    }
   
}

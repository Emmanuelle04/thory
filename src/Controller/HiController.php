<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;



class HiController extends AbstractController
{
    /**
     * @Route("/hi/{name}", name="hi")
     */

    public function hello($name): Response
    {
      return $this->render('hi/index.html.twig',['name'=>$name]);

    }
}

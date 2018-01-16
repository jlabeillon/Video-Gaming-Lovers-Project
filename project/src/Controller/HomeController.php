<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;
use App\Entity\Test;

class HomeController extends Controller

{
    public function home()
    {
        $article = $this->getDoctrine()->getRepository(Article::class)->findAll();
        $test = $this->getDoctrine()->getRepository(Test::class)->findAll();
        return $this->render('home/home.html.twig', array('article' => $article, 'test' => $test,));
    }
}

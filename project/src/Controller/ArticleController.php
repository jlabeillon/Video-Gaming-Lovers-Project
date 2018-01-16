<?php
namespace App\Controller;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Article;
use App\Entity\Comment;


class ArticleController extends Controller
{
  public function show($id)
  {
    $repository = $this->getDoctrine()->getRepository(Article::class);

    $article = $repository->find($id);

    $article_id = $article->getId();

    $comment = $this->getDoctrine()->getRepository(Comment::class)->findByArticle($article_id);
    
    return $this->render('article/show.html.twig', array('article' => $article, 'comment' => $comment,));

  }
}



 ?>

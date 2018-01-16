<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker;
use App\Entity\Article;
use App\Entity\Comment;


class ArticleFixtures extends Fixture
{
  public function load(ObjectManager $manager)
  {
    $date = new \DateTime('');
    for ($i = 1; $i < 11; $i++) {
            $article = new Article();
            $manager->persist($article);

            for ($j=1; $j < 5; $j++) {
              $comment = new Comment();
              $comment->setDate($date);
              $comment->setContent('The article number '.$i.', is my favorite !');
              $comment->setArticle($article);
              $manager-> persist($comment);
            }


            $article->setTitle('Article number '.$i);
            $article->setThumbnail('pictures/nogame.png');
            $article->setDate($date);
            $article->setImage('pictures/gamingpic.jpg');
            $article->setContent('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.');
            $article->addComment($comment);
            $manager->persist($article);
      }

        $manager->flush();
  }
}


 ?>

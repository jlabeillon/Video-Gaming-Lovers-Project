<?php

namespace App\Repository;

use App\Entity\Comment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CommentRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Comment::class);
    }


    public function findByArticle($id)
    {
        return $this->createQueryBuilder('c')
            ->where('c.article = :id')->setParameter('id', $id)
            ->getQuery()
            ->getResult()
        ;
    }

}

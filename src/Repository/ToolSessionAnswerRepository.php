<?php

namespace App\Repository;

use App\Entity\ToolSessionAnswer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ToolSessionAnswer|null find($id, $lockMode = null, $lockVersion = null)
 * @method ToolSessionAnswer|null findOneBy(array $criteria, array $orderBy = null)
 * @method ToolSessionAnswer[]    findAll()
 * @method ToolSessionAnswer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToolSessionAnswerRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ToolSessionAnswer::class);
    }

    // /**
    //  * @return ToolSessionAnswer[] Returns an array of ToolSessionAnswer objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ToolSessionAnswer
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

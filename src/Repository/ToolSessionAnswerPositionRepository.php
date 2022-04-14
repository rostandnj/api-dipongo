<?php

namespace App\Repository;

use App\Entity\ToolSessionAnswerPosition;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ToolSessionAnswerPosition|null find($id, $lockMode = null, $lockVersion = null)
 * @method ToolSessionAnswerPosition|null findOneBy(array $criteria, array $orderBy = null)
 * @method ToolSessionAnswerPosition[]    findAll()
 * @method ToolSessionAnswerPosition[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ToolSessionAnswerPositionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ToolSessionAnswerPosition::class);
    }

    // /**
    //  * @return ToolSessionAnswerPosition[] Returns an array of ToolSessionAnswerPosition objects
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
    public function findOneBySomeField($value): ?ToolSessionAnswerPosition
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

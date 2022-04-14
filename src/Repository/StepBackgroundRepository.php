<?php

namespace App\Repository;

use App\Entity\StepBackground;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StepBackground|null find($id, $lockMode = null, $lockVersion = null)
 * @method StepBackground|null findOneBy(array $criteria, array $orderBy = null)
 * @method StepBackground[]    findAll()
 * @method StepBackground[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StepBackgroundRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StepBackground::class);
    }

    // /**
    //  * @return StepBackground[] Returns an array of StepBackground objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?StepBackground
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

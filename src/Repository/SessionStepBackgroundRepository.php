<?php

namespace App\Repository;

use App\Entity\SessionStepBackground;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SessionStepBackground|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionStepBackground|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionStepBackground[]    findAll()
 * @method SessionStepBackground[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionStepBackgroundRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionStepBackground::class);
    }

    // /**
    //  * @return SessionStepBackground[] Returns an array of SessionStepBackground objects
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
    public function findOneBySomeField($value): ?SessionStepBackground
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

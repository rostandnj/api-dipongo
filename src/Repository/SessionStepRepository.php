<?php

namespace App\Repository;

use App\Entity\SessionStep;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SessionStep|null find($id, $lockMode = null, $lockVersion = null)
 * @method SessionStep|null findOneBy(array $criteria, array $orderBy = null)
 * @method SessionStep[]    findAll()
 * @method SessionStep[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SessionStepRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SessionStep::class);
    }

    // /**
    //  * @return SessionStep[] Returns an array of SessionStep objects
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
    public function findOneBySomeField($value): ?SessionStep
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

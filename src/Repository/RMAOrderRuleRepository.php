<?php

namespace App\Repository;

use App\Entity\RMAOrderRule;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RMAOrderRule|null find($id, $lockMode = null, $lockVersion = null)
 * @method RMAOrderRule|null findOneBy(array $criteria, array $orderBy = null)
 * @method RMAOrderRule[]    findAll()
 * @method RMAOrderRule[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RMAOrderRuleRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RMAOrderRule::class);
    }

    // /**
    //  * @return RMAOrderRule[] Returns an array of RMAOrderRule objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('r.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?RMAOrderRule
    {
        return $this->createQueryBuilder('r')
            ->andWhere('r.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

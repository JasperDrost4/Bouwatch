<?php

namespace App\Repository;

use App\Entity\RMAOrder;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method RMAOrder|null find($id, $lockMode = null, $lockVersion = null)
 * @method RMAOrder|null findOneBy(array $criteria, array $orderBy = null)
 * @method RMAOrder[]    findAll()
 * @method RMAOrder[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RMAOrderRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RMAOrder::class);
    }

    // /**
    //  * @return RMAOrder[] Returns an array of RMAOrder objects
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
    public function findOneBySomeField($value): ?RMAOrder
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

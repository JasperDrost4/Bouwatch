<?php

namespace App\Repository;

use App\Entity\ProductionLog;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ProductionLog|null find($id, $lockMode = null, $lockVersion = null)
 * @method ProductionLog|null findOneBy(array $criteria, array $orderBy = null)
 * @method ProductionLog[]    findAll()
 * @method ProductionLog[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductionLogRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductionLog::class);
    }

    // /**
    //  * @return ProductionLog[] Returns an array of ProductionLog objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('p.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ProductionLog
    {
        return $this->createQueryBuilder('p')
            ->andWhere('p.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

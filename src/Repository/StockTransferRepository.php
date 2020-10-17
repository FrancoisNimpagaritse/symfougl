<?php

namespace App\Repository;

use App\Entity\StockTransfer;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StockTransfer|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockTransfer|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockTransfer[]    findAll()
 * @method StockTransfer[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockTransferRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockTransfer::class);
    }

    // /**
    //  * @return StockTransfer[] Returns an array of StockTransfer objects
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
    public function findOneBySomeField($value): ?StockTransfer
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

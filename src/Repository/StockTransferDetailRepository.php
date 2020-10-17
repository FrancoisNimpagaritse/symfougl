<?php

namespace App\Repository;

use App\Entity\StockTransferDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method StockTransferDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method StockTransferDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method StockTransferDetail[]    findAll()
 * @method StockTransferDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StockTransferDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, StockTransferDetail::class);
    }

    // /**
    //  * @return StockTransferDetail[] Returns an array of StockTransferDetail objects
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
    public function findOneBySomeField($value): ?StockTransferDetail
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

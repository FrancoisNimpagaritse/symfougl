<?php

namespace App\Repository;

use App\Entity\SortieStockDetail;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method SortieStockDetail|null find($id, $lockMode = null, $lockVersion = null)
 * @method SortieStockDetail|null findOneBy(array $criteria, array $orderBy = null)
 * @method SortieStockDetail[]    findAll()
 * @method SortieStockDetail[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class SortieStockDetailRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, SortieStockDetail::class);
    }

    // /**
    //  * @return SortieStockDetail[] Returns an array of SortieStockDetail objects
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
    public function findOneBySomeField($value): ?SortieStockDetail
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

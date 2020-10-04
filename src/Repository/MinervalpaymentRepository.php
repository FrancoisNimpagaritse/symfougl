<?php

namespace App\Repository;

use App\Entity\Minervalpayment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Minervalpayment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Minervalpayment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Minervalpayment[]    findAll()
 * @method Minervalpayment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class MinervalpaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Minervalpayment::class);
    }

    // /**
    //  * @return Minervalpayment[] Returns an array of Minervalpayment objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('m.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Minervalpayment
    {
        return $this->createQueryBuilder('m')
            ->andWhere('m.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

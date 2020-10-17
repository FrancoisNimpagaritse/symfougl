<?php

namespace App\Repository;

use App\Entity\UnityMeasure;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method UnityMeasure|null find($id, $lockMode = null, $lockVersion = null)
 * @method UnityMeasure|null findOneBy(array $criteria, array $orderBy = null)
 * @method UnityMeasure[]    findAll()
 * @method UnityMeasure[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UnityMeasureRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, UnityMeasure::class);
    }

    // /**
    //  * @return UnityMeasure[] Returns an array of UnityMeasure objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?UnityMeasure
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

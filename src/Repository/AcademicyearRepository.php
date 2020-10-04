<?php

namespace App\Repository;

use App\Entity\Academicyear;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Academicyear|null find($id, $lockMode = null, $lockVersion = null)
 * @method Academicyear|null findOneBy(array $criteria, array $orderBy = null)
 * @method Academicyear[]    findAll()
 * @method Academicyear[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AcademicyearRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Academicyear::class);
    }

    // /**
    //  * @return Academicyear[] Returns an array of Academicyear objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('a.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Academicyear
    {
        return $this->createQueryBuilder('a')
            ->andWhere('a.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

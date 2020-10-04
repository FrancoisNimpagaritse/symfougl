<?php

namespace App\Repository;

use App\Entity\Coursesperiod;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Coursesperiod|null find($id, $lockMode = null, $lockVersion = null)
 * @method Coursesperiod|null findOneBy(array $criteria, array $orderBy = null)
 * @method Coursesperiod[]    findAll()
 * @method Coursesperiod[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class CoursesperiodRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Coursesperiod::class);
    }

    // /**
    //  * @return Coursesperiod[] Returns an array of Courseperiod objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Coursesperiod
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

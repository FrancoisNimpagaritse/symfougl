<?php

namespace App\Repository;

use App\Entity\EnumNiveau;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method EnumNiveau|null find($id, $lockMode = null, $lockVersion = null)
 * @method EnumNiveau|null findOneBy(array $criteria, array $orderBy = null)
 * @method EnumNiveau[]    findAll()
 * @method EnumNiveau[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EnumNiveauRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, EnumNiveau::class);
    }

    // /**
    //  * @return EnumNiveau[] Returns an array of EnumNiveau objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?EnumNiveau
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

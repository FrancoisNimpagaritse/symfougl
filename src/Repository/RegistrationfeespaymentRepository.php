<?php

namespace App\Repository;

use App\Entity\Registrationfeespayment;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Registrationfeespayment|null find($id, $lockMode = null, $lockVersion = null)
 * @method Registrationfeespayment|null findOneBy(array $criteria, array $orderBy = null)
 * @method Registrationfeespayment[]    findAll()
 * @method Registrationfeespayment[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegistrationfeespaymentRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Registrationfeespayment::class);
    }

    // /**
    //  * @return Registrationfeespayment[] Returns an array of Registrationfeespayment objects
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
    public function findOneBySomeField($value): ?Registrationfeespayment
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

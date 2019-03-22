<?php

namespace App\Repository;

use App\Entity\Belaege;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Belaege|null find($id, $lockMode = null, $lockVersion = null)
 * @method Belaege|null findOneBy(array $criteria, array $orderBy = null)
 * @method Belaege[]    findAll()
 * @method Belaege[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BelaegeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Belaege::class);
    }

    // /**
    //  * @return Belaege[] Returns an array of Belaege objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Belaege
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

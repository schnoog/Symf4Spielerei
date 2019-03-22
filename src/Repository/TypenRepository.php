<?php

namespace App\Repository;

use App\Entity\Typen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Typen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Typen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Typen[]    findAll()
 * @method Typen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TypenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Typen::class);
    }

    // /**
    //  * @return Typen[] Returns an array of Typen objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('t.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Typen
    {
        return $this->createQueryBuilder('t')
            ->andWhere('t.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Laender;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Laender|null find($id, $lockMode = null, $lockVersion = null)
 * @method Laender|null findOneBy(array $criteria, array $orderBy = null)
 * @method Laender[]    findAll()
 * @method Laender[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaenderRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Laender::class);
    }

    // /**
    //  * @return Laender[] Returns an array of Laender objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('l.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Laender
    {
        return $this->createQueryBuilder('l')
            ->andWhere('l.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

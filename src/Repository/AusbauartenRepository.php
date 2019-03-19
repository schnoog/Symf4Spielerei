<?php

namespace App\Repository;

use App\Entity\Ausbauarten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Ausbauarten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Ausbauarten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Ausbauarten[]    findAll()
 * @method Ausbauarten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class AusbauartenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Ausbauarten::class);
    }

    // /**
    //  * @return Ausbauarten[] Returns an array of Ausbauarten objects
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
    public function findOneBySomeField($value): ?Ausbauarten
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

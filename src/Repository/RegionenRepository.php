<?php

namespace App\Repository;

use App\Entity\Regionen;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Regionen|null find($id, $lockMode = null, $lockVersion = null)
 * @method Regionen|null findOneBy(array $criteria, array $orderBy = null)
 * @method Regionen[]    findAll()
 * @method Regionen[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RegionenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Regionen::class);
    }

    // /**
    //  * @return Regionen[] Returns an array of Regionen objects
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
    public function findOneBySomeField($value): ?Regionen
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

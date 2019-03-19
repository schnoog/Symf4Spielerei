<?php

namespace App\Repository;

use App\Entity\Kategorien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Kategorien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Kategorien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Kategorien[]    findAll()
 * @method Kategorien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class KategorienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Kategorien::class);
    }

    // /**
    //  * @return Kategorien[] Returns an array of Kategorien objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('k.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Kategorien
    {
        return $this->createQueryBuilder('k')
            ->andWhere('k.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

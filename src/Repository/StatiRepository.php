<?php

namespace App\Repository;

use App\Entity\Stati;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Stati|null find($id, $lockMode = null, $lockVersion = null)
 * @method Stati|null findOneBy(array $criteria, array $orderBy = null)
 * @method Stati[]    findAll()
 * @method Stati[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class StatiRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Stati::class);
    }

    // /**
    //  * @return Stati[] Returns an array of Stati objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('s.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Stati
    {
        return $this->createQueryBuilder('s')
            ->andWhere('s.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Fahrbahnbreiten;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Fahrbahnbreiten|null find($id, $lockMode = null, $lockVersion = null)
 * @method Fahrbahnbreiten|null findOneBy(array $criteria, array $orderBy = null)
 * @method Fahrbahnbreiten[]    findAll()
 * @method Fahrbahnbreiten[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FahrbahnbreitenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Fahrbahnbreiten::class);
    }

    // /**
    //  * @return Fahrbahnbreiten[] Returns an array of Fahrbahnbreiten objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('f.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Fahrbahnbreiten
    {
        return $this->createQueryBuilder('f')
            ->andWhere('f.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

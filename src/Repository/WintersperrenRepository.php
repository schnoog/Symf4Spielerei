<?php

namespace App\Repository;

use App\Entity\Wintersperren;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Wintersperren|null find($id, $lockMode = null, $lockVersion = null)
 * @method Wintersperren|null findOneBy(array $criteria, array $orderBy = null)
 * @method Wintersperren[]    findAll()
 * @method Wintersperren[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class WintersperrenRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Wintersperren::class);
    }

    // /**
    //  * @return Wintersperren[] Returns an array of Wintersperren objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('w.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Wintersperren
    {
        return $this->createQueryBuilder('w')
            ->andWhere('w.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\Laenderkategorien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Laenderkategorien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Laenderkategorien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Laenderkategorien[]    findAll()
 * @method Laenderkategorien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaenderkategorienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Laenderkategorien::class);
    }

    // /**
    //  * @return Laenderkategorien[] Returns an array of Laenderkategorien objects
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
    public function findOneBySomeField($value): ?Laenderkategorien
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

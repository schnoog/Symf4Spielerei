<?php

namespace App\Repository;

use App\Entity\Laenderkategrien;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Laenderkategrien|null find($id, $lockMode = null, $lockVersion = null)
 * @method Laenderkategrien|null findOneBy(array $criteria, array $orderBy = null)
 * @method Laenderkategrien[]    findAll()
 * @method Laenderkategrien[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class LaenderkategrienRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Laenderkategrien::class);
    }

    // /**
    //  * @return Laenderkategrien[] Returns an array of Laenderkategrien objects
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
    public function findOneBySomeField($value): ?Laenderkategrien
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

<?php

namespace App\Repository;

use App\Entity\Icons;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Icons|null find($id, $lockMode = null, $lockVersion = null)
 * @method Icons|null findOneBy(array $criteria, array $orderBy = null)
 * @method Icons[]    findAll()
 * @method Icons[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class IconsRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Icons::class);
    }

    // /**
    //  * @return Icons[] Returns an array of Icons objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('i.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Icons
    {
        return $this->createQueryBuilder('i')
            ->andWhere('i.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

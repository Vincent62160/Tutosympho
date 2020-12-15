<?php

namespace App\Repository;

use App\Entity\Blogcat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method Blogcat|null find($id, $lockMode = null, $lockVersion = null)
 * @method Blogcat|null findOneBy(array $criteria, array $orderBy = null)
 * @method Blogcat[]    findAll()
 * @method Blogcat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BlogcatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Blogcat::class);
    }

    // /**
    //  * @return Blogcat[] Returns an array of Blogcat objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('b.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Blogcat
    {
        return $this->createQueryBuilder('b')
            ->andWhere('b.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

<?php

namespace App\Repository;

use App\Entity\ContentManagementSystem;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method ContentManagementSystem|null find($id, $lockMode = null, $lockVersion = null)
 * @method ContentManagementSystem|null findOneBy(array $criteria, array $orderBy = null)
 * @method ContentManagementSystem[]    findAll()
 * @method ContentManagementSystem[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ContentManagementSystemRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ContentManagementSystem::class);
    }

    // /**
    //  * @return ContentManagementSystem[] Returns an array of ContentManagementSystem objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('c.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?ContentManagementSystem
    {
        return $this->createQueryBuilder('c')
            ->andWhere('c.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

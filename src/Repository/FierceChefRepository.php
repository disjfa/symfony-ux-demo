<?php

namespace App\Repository;

use App\Entity\FierceChef;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FierceChef|null find($id, $lockMode = null, $lockVersion = null)
 * @method FierceChef|null findOneBy(array $criteria, array $orderBy = null)
 * @method FierceChef[]    findAll()
 * @method FierceChef[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FierceChefRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FierceChef::class);
    }

    // /**
    //  * @return FierceChef[] Returns an array of FierceChef objects
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
    public function findOneBySomeField($value): ?FierceChef
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

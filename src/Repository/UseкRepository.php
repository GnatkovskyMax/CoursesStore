<?php

namespace App\Repository;

use App\Entity\Useк;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Useк|null find($id, $lockMode = null, $lockVersion = null)
 * @method Useк|null findOneBy(array $criteria, array $orderBy = null)
 * @method Useк[]    findAll()
 * @method Useк[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class UseкRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Useк::class);
    }

    // /**
    //  * @return Useк[] Returns an array of Useк objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('u.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /*
    public function findOneBySomeField($value): ?Useк
    {
        return $this->createQueryBuilder('u')
            ->andWhere('u.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */
}

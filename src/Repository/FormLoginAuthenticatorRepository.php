<?php

namespace App\Repository;

use App\Entity\FormLoginAuthenticator;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @method FormLoginAuthenticator|null find($id, $lockMode = null, $lockVersion = null)
 * @method FormLoginAuthenticator|null findOneBy(array $criteria, array $orderBy = null)
 * @method FormLoginAuthenticator[]    findAll()
 * @method FormLoginAuthenticator[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FormLoginAuthenticatorRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FormLoginAuthenticator::class);
    }

    // /**
    //  * @return FormLoginAuthenticator[] Returns an array of FormLoginAuthenticator objects
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
    public function findOneBySomeField($value): ?FormLoginAuthenticator
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

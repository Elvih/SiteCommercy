<?php

namespace App\Repository;

use App\Entity\Evenement;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;

/**
 * @method Evenement|null find($id, $lockMode = null, $lockVersion = null)
 * @method Evenement|null findOneBy(array $criteria, array $orderBy = null)
 * @method Evenement[]    findAll()
 * @method Evenement[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class EvenementRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Evenement::class);
    }

    // /**
    //  * @return Evenement[] Returns an array of Evenement objects
    //  */
    /*
    public function findByExampleField($value)
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->orderBy('e.id', 'ASC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult()
        ;
    }
    */

    /**
    * @return Evenement[]
    */
    public function findLatest(): array
    {
        return $this->findVisibleQuery()
            ->setMaxResults(5)
            ->getQuery()
            ->getResult();
    }



    private function findVisibleQuery(): QueryBuilder
    {
        return $this->createQueryBuilder('p');
    }

    public function findFestivite()
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Type = 1')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    public function findActualite()
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Type = 2')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    public function findEcole()
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.Type = 3')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();
    }


    /*
    public function findOneBySomeField($value): ?Evenement
    {
        return $this->createQueryBuilder('e')
            ->andWhere('e.exampleField = :val')
            ->setParameter('val', $value)
            ->getQuery()
            ->getOneOrNullResult()
        ;
    }
    */



}

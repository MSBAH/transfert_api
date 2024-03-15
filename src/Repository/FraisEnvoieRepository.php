<?php

namespace App\Repository;

use App\Entity\FraisEnvoie;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<FraisEnvoie>
 *
 * @method FraisEnvoie|null find($id, $lockMode = null, $lockVersion = null)
 * @method FraisEnvoie|null findOneBy(array $criteria, array $orderBy = null)
 * @method FraisEnvoie[]    findAll()
 * @method FraisEnvoie[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class FraisEnvoieRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, FraisEnvoie::class);
    }

    //    /**
    //     * @return FraisEnvoie[] Returns an array of FraisEnvoie objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('f.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?FraisEnvoie
    //    {
    //        return $this->createQueryBuilder('f')
    //            ->andWhere('f.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }
}

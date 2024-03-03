<?php

namespace App\Repository;

use App\Entity\OperationUv;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<OperationUv>
 *
 * @method OperationUv|null find($id, $lockMode = null, $lockVersion = null)
 * @method OperationUv|null findOneBy(array $criteria, array $orderBy = null)
 * @method OperationUv[]    findAll()
 * @method OperationUv[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class OperationUvRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, OperationUv::class);
    }

//    /**
//     * @return OperationUv[] Returns an array of OperationUv objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('o.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?OperationUv
//    {
//        return $this->createQueryBuilder('o')
//            ->andWhere('o.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

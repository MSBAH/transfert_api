<?php

namespace App\Repository;

use App\Entity\TauxEchange;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<TauxEchange>
 *
 * @method TauxEchange|null find($id, $lockMode = null, $lockVersion = null)
 * @method TauxEchange|null findOneBy(array $criteria, array $orderBy = null)
 * @method TauxEchange[]    findAll()
 * @method TauxEchange[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class TauxEchangeRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, TauxEchange::class);
    }

//    /**
//     * @return TauxEchange[] Returns an array of TauxEchange objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('t.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?TauxEchange
//    {
//        return $this->createQueryBuilder('t')
//            ->andWhere('t.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

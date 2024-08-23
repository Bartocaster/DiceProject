<?php

namespace App\Repository;

use App\Entity\RaceTraits;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<RaceTraits>
 *
 * @method RaceTraits|null find($id, $lockMode = null, $lockVersion = null)
 * @method RaceTraits|null findOneBy(array $criteria, array $orderBy = null)
 * @method RaceTraits[]    findAll()
 * @method RaceTraits[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class RaceTraitsRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, RaceTraits::class);
    }

//    /**
//     * @return RaceTraits[] Returns an array of RaceTraits objects
//     */
//    public function findByExampleField($value): array
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->orderBy('r.id', 'ASC')
//            ->setMaxResults(10)
//            ->getQuery()
//            ->getResult()
//        ;
//    }

//    public function findOneBySomeField($value): ?RaceTraits
//    {
//        return $this->createQueryBuilder('r')
//            ->andWhere('r.exampleField = :val')
//            ->setParameter('val', $value)
//            ->getQuery()
//            ->getOneOrNullResult()
//        ;
//    }
}

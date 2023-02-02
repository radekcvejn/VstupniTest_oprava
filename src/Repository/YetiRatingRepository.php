<?php

namespace App\Repository;
use App\Entity\YetiRating;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
/**
 * @extends ServiceEntityRepository<YetiRating>
 * @method YetiRating|null find($id, $lockMode = null, $lockVersion = null)
 * @method YetiRating|null findOneBy(array $criteria, array $orderBy = null)
 * @method YetiRating[]    findAll()
 * @method YetiRating[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YetiRatingRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, YetiRating::class);
    }
}
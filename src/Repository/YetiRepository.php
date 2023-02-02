<?php

namespace App\Repository;

use App\Entity\Yeti;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;



/**
 * @extends ServiceEntityRepository<Yeti>
 *
 * @method Yeti|null find($id, $lockMode = null, $lockVersion = null)
 * @method Yeti|null findOneBy(array $criteria, array $orderBy = null)
 * @method Yeti[]    findAll()
 * @method Yeti[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class YetiRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Yeti::class);
    }

    public function save(Yeti $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Yeti $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    public function findTopRatedYetis(): array
    {
        return $this->createQueryBuilder('y')
            ->select('y.name', 'y.height', 'y.weight', 'y.age','y.location', 'AVG(yr.value) as avg_rating')
            ->leftJoin('y.ratings', 'yr')
            ->groupBy('y.id')
            ->orderBy('avg_rating', 'DESC')
            ->setMaxResults(10)
            ->getQuery()
            ->getResult();

    }
}

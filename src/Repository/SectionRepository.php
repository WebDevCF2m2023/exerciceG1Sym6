<?php

namespace App\Repository;

use App\Entity\Section;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Section>
 */
class SectionRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Section::class);
    }

    //    /**
    //     * @return Section[] Returns an array of Section objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('s.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Section
    //    {
    //        return $this->createQueryBuilder('s')
    //            ->andWhere('s.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function getPostsBySectionId(int $sectionId) : array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.section', 's')
            ->leftJoin('p.post_section', 'phs')
            ->where('p.postIsPublished = :published')
            ->andWhere('phs.sectionId = :sectionId')
            ->andWhere('p.id = phs.postId')
            ->setParameter('published', true)
            ->setParameter('sectionId', $sectionId)
            ->getQuery()
            ->getResult();

    }
}
/*
 * SELECT  p.* FROM section s
LEFT JOIN post_section phs
ON phs.section_id = s.id
LEFT JOIN post p
ON p.id = phs.post_id
WHERE p.post_is_published = true
AND s.id = ?
 */
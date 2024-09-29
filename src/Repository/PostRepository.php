<?php

namespace App\Repository;

use App\Entity\Post;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Post>
 */
class PostRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Post::class);
    }

    //    /**
    //     * @return Post[] Returns an array of Post objects
    //     */
    //    public function findByExampleField($value): array
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->orderBy('p.id', 'ASC')
    //            ->setMaxResults(10)
    //            ->getQuery()
    //            ->getResult()
    //        ;
    //    }

    //    public function findOneBySomeField($value): ?Post
    //    {
    //        return $this->createQueryBuilder('p')
    //            ->andWhere('p.exampleField = :val')
    //            ->setParameter('val', $value)
    //            ->getQuery()
    //            ->getOneOrNullResult()
    //        ;
    //    }

    public function getPublishedPosts(): array
    {
        return $this->createQueryBuilder('p')
            ->where('p.postIsPublished = :published')
            ->setParameter('published', true)
            ->orderBy('p.postDateCreated', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function getPostsByAuthorId(string $authorId): array
    {
        return $this->createQueryBuilder('p')
            ->leftJoin('p.user', 'u')
            ->addSelect('u')
            ->where('p.postIsPublished = :published')
            ->setParameter('published', true)
            ->andWhere('u.id = :id')
            ->setParameter('id', $authorId)
            ->orderBy('p.postDateCreated', 'DESC')
            ->getQuery()
            ->getResult();
    }

    public function getPostsBySectionId(string $sectionId) : array
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.sections', 's')
            ->where('p.postIsPublished = :published')
            ->setParameter('published', true)
            ->andWhere('s.id = :sectionId')
            ->setParameter('sectionId', $sectionId)
            ->orderBy('p.postDateCreated', 'DESC') 
            ->getQuery()
            ->getResult();
    }
}
/*
SELECT  p.* FROM section s
LEFT JOIN post_section phs
ON phs.section_id = s.id
LEFT JOIN post p
ON p.id = phs.post_id
WHERE p.post_is_published = true
AND s.id = ?
 */
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

/*
SELECT  p.* FROM section s
LEFT JOIN post_section phs
ON phs.section_id = s.id
LEFT JOIN post p
ON p.id = phs.post_id
WHERE p.post_is_published = true
AND s.id = ?
 */
    }

    public function getPostsByTagId(string $tagId) : array
    {
        return $this->createQueryBuilder('p')
            ->innerJoin('p.tags', 't')
            ->where('p.postIsPublished = :published')
            ->setParameter('published', true)
            ->andWhere('t.id = :tagId')
            ->setParameter('tagId', $tagId)
            ->orderBy('p.postDateCreated', 'DESC')
            ->getQuery()
            ->getResult();
        /*
SELECT  p.* FROM tag t
LEFT JOIN post_tag pht
ON pht.tag_id = t.id
LEFT JOIN post p
ON p.id = pht.post_id
WHERE p.post_is_published = true
AND t.id = 2
         */
    }

    public function getPostsAndAllInfo()
    {

        return $this->createQueryBuilder('p')
            ->leftJoin('p.user', 'u')
            ->addSelect('u')
            ->leftJoin('p.sections', 's')
            ->addSelect('s')
            ->leftJoin('p.tags', 't')
            ->addSelect('t')
            ->where('p.postIsPublished = :published')
            ->setParameter('published', true)
            ->orderBy('p.postDateCreated', 'DESC')
            ->getQuery()
            ->getResult();

        /*
SELECT p.*, u.*, s.*, t.* FROM `post` p
LEFT JOIN user u
ON u.id = p.user_id
LEFT JOIN post_section phs
ON phs.post_id = p.id
LEFT JOIN section s
ON phs.section_id = s.id
LEFT JOIN post_tag pht
ON pht.post_id = p.id
LEFT JOIN tag t
ON t.id = pht.tag_id
WHERE p.post_is_published = true
ORDER BY p.post_date_created DESC
         */
    }


}

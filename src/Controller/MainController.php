<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\SectionRepository;
use App\Repository\TagRepository;
use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(TagRepository $tagRepository,
                          SectionRepository $sectionRepository,
                          PostRepository $postRepository,
                          UserRepository $userRepository): Response
    {
        $posts = $postRepository->getPublishedPosts();

        return $this->render('main/index.html.twig', [
            'tags' => $tagRepository->findAll(),
            'sections' => $sectionRepository->findAll(),
            'posts' => $posts,
            'users' => $userRepository->findAll(),
        ]);
    }


    #[Route('/author/{id}', name: 'app_author', methods: ['GET'])]
    public function author(PostRepository $postRepository, int $id): Response
    {
        $posts = $postRepository->getPostsByAuthorId($id);
        return $this->render('main/author.html.twig', [
            'posts' => $posts
        ]);
    }

    #[Route('/section/{id}', name: 'app_section', methods: ['GET'])]
    public function section(SectionRepository $sectionRepository, int $id): Response
    {
        $sections = $sectionRepository->getPostsBySectionId($id);
        return $this->render('main/section.html.twig', [
            'sections' => $sections
        ]);
    }

    #[Route('/tag/{id}', name: 'app_tag', methods: ['GET'])]
    public function tag(TagRepository $tagRepository, int $id): Response
    {
        $tags = $tagRepository->getPostsByTagId($id);
        return $this->render('main/tag.html.twig', [
            'tags' => $tags
        ]);
    }
}

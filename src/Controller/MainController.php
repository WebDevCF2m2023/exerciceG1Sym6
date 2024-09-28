<?php

namespace App\Controller;

use App\Repository\PostRepository;
use App\Repository\SectionRepository;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main')]
    public function index(TagRepository $tagRepository,
                          SectionRepository $sectionRepository,
                          PostRepository $postRepository): Response
    {
        return $this->render('main/index.html.twig', [
            'tags' => $tagRepository->findAll(),
            'sections' => $sectionRepository->findAll(),
            'posts' => $postRepository->findAll(),
        ]);
    }
}

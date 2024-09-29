<?php

namespace App\Controller;

use App\Entity\Post;
use App\Form\Post1Type;
use App\Repository\PostRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/visitor/post')]
final class VisitorPostController extends AbstractController
{
    #[Route(name: 'app_visitor_post_index', methods: ['GET'])]
    public function index(PostRepository $postRepository): Response
    {
        return $this->render('visitor_post/index.html.twig', [
            'posts' => $postRepository->findAll(),
        ]);
    }

    #[Route('/{id}', name: 'app_visitor_post_show', methods: ['GET'])]
    public function show(Post $post): Response
    {
        return $this->render('visitor_post/show.html.twig', [
            'post' => $post,
        ]);
    }




}

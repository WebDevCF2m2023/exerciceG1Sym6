<?php

namespace App\Controller;

use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'app_main', methods: ['GET'])]
    public function index(TagRepository $tagRepository): Response
    {
        return $this->render('main/index.html.twig', [
              'tags' => $tagRepository->findAll(),
        ]);
    }
}

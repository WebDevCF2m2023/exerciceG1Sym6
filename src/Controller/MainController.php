<?php

namespace App\Controller;
use App\Repository\SectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class MainController extends AbstractController
{
    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        return $this->render('main/index.html.twig', [
            'title' => 'Accueil',
            'homepage_text' =>  "Nous sommes le ".date('d/m/Y \à H:i'),

        ]);
    }
    #[Route('/about', name: 'about_me')]
    public function aboutMe(SectionRepository $sections): Response
    {
        return $this->render('main/about.html.twig', [
            'title' => 'About me',
            'homepage_text'=> "Et je parle encore de moi !",
            # on met dans une variable pour twig toutes les sections récupérées
            'sections' => $sections->findAll()
        ]);
    }
}

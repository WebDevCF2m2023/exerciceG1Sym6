<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
// gère les requêtes
use Doctrine\ORM\EntityManagerInterface;
// entité Post
use App\Entity\Post;
// entité Section
use App\Entity\Section;

class MainController extends AbstractController
{
    private EntityManagerInterface $em;
    private ?array $menu;

    public function __construct(EntityManagerInterface $entityManager){
        $this->em = $entityManager;
        $this->menu = $this->em->getRepository(Section::class)->findAll();
    }

    #[Route('/', name: 'homepage')]
    public function index(): Response
    {
        // on veut récupérer tous les articles qui sont actifs
        // classés par date DESC Mais que les 20 dernières
        // On récupère l'Entity Manager
        $articles = $this->em
            // on récupère l'entité Post
            ->getRepository(Post::class)
            // lorsque les articles sont publiés
            ->findBy(['postIsPublished' => true],
            // ordonnés par date de publication DESC
            ['postDatePublished'=>'DESC'],20);

        return $this->render('main/index.html.twig', [
            'articles' => $articles,
            'sections' => $this->menu,
        ]);
    }
    #[Route('/section/{id}', name: 'section')]
    public function section(int $id): ?Response
    {

    }
}

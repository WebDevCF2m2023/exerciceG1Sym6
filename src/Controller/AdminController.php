<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class AdminController extends AbstractController
{
    #[Route('/', name: 'app_admin')]
    public function index(SecurityController $security): Response
    {
        $user = $security->getUser();
        return $this->render('admin/index.html.twig', [
            'user' => $user,
        ]);
    }
}

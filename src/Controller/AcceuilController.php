<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AcceuilController extends AbstractController
{
    #[Route('/acceuil', name: 'app_acceuil')]
    public function index(): Response
    {
        return $this->render('acceuil/acceuil.html.twig', [
            'controller_name' => 'AcceuilController',
        ]);
    
    }
    #[Route('/acceuil', name: 'app_home')]
    public function home(): Response
    {
        return $this->render('acceuil/acceuil.html.twig');
    }

    #[Route('/hyp', name: 'app_hyp')]
    public function hyp(): Response
    {
        return $this->render('acceuil/hyp.html.twig');
    }

    #[Route('/ponpon', name: 'app_ponpon')]
    public function ponpon(): Response
    {
        return $this->render('acceuil/ponpon.html.twig');
    }



    #[Route('/user', name: 'app_user')]
    public function forum(): Response
    {
        // Assuming you have a separate template for the forum
        return $this->render('user/forum.html.twig');
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\User;
use App\Form\UserType;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

// use Symfony\Component\Form\FormTypeInterface;
#[Route('/home')]
class UserController extends AbstractController
{
    #[Route('/', name: 'app_user_index', methods: ['GET'])]
    public function index(UserRepository $userRepository): Response
    {
        return $this->render('user/home.html.twig', [
            
        ]);
    }
    #[Route('/user', name: 'app_user',methods: ['GET', 'POST'])]
    public function form(Request $request,EntityManagerInterface $entityManager): Response
    {
        $user=new User();
        $form=$this->createForm(UserType::class,$user);

        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($user);
            $entityManager->flush();

            return $this->redirectToRoute('app_user_index', [], Response::HTTP_SEE_OTHER);
        }
        return $this->render('user/index.html.twig', [
            'controller_name' => 'UserController',
            'form_data'=>$form->createView(),
            'user'=>$user,
            'form'=>$form
        ]);
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginSuccessController extends AbstractController
{
    #[Route('/', name: 'app_login_success')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
        return $this->render('login_success/index.html.twig', [
            'user' => $authenticationUtils->getLastUsername()
        ]);
    }
}

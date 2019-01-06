<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\RegistrationFormType;
use App\Security\LoginFormAuthenticator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\UserRepository;

class UserAreaController extends AbstractController
{
    /**
     * @Route("/user/{userId}", name="user_area", requirements={"userId"="\d+"})
     */
    public function index(Request $request, EntityManagerInterface $em, UserRepository $userRepository, int $userId): Response
    {
        $user = $userRepository->find($userId);
        if ($user)
        {
            return new Response('<html><body>This is the restricted user area. User-ID: '.$userId.'</body></html>');
        }
    }
}

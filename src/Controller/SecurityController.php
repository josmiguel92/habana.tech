<?php

namespace App\Controller;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class SecurityController extends AbstractController
{

    /**
     * @Route("/login", name="app_login")
     */
    public function login(AuthenticationUtils $authenticationUtils): Response
    {
        // get the login error if there is one
        $error = $authenticationUtils->getLastAuthenticationError();
        // last username entered by the user
        $lastUsername = $authenticationUtils->getLastUsername();

        return $this->render('security/login.html.twig', ['last_username' => $lastUsername, 'error' => $error]);
    }


    /**
     * @Route("/adduser", name="adduser")
     */
    public function adduser(UserPasswordEncoderInterface $passwordEncoder): Response
    {
        //TODO: make users securely
       $user = new User();

       $user->setEmail('user@host.com')
           ->setRoles(['ROLE_USER','ROLE_ADMIN'])
           ->setPassword($passwordEncoder->encodePassword($user, '123'));
       $em = $this->getDoctrine()->getManager();
       /*
       $em->persist($user);
       $em->flush();
       */

        return new Response('done');
    }
}

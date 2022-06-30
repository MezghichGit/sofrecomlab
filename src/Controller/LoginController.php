<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class LoginController extends AbstractController
{
    
    /*public function index(): Response
    {
        return $this->render('login/index.html.twig', [
            'controller_name' => 'LoginController',
        ]);
    }*/
    #[Route('/login', name: 'login')]
    public function index(AuthenticationUtils $authenticationUtils): Response
    {
            // get the login error if there is one
            $error = $authenticationUtils->getLastAuthenticationError();

            // last username entered by the user
            $lastUsername = $authenticationUtils->getLastUsername();
       /*
          */
    

        return $this->render('login/index.html.twig', [
             'controller_name' => 'LoginController',
             'last_username' => $lastUsername,
             'error'         => $error,
        ]);
    }

    #[Route('/dashboard', name: 'dashboard')]
    public function dashboard()
    {
        if ($this->getUser()) {
            if (in_array("ROLE_ADMIN", $this->getUser()->getRoles())) {
                return $this->redirectToRoute('dashboardAdmin');
            }

            if (in_array("ROLE_CLIENT", $this->getUser()->getRoles())) {
                return $this->redirectToRoute('dashboardClient');
            }
               //return new Response("Connected ".  $lastUsername  );
            }
    }
    #[Route('/logout', name: 'logout')]
    public function logout()
    {
        //throw new \Exception('Don\'t forget to activate logout in security.yaml');
        //return $this->redirect($this->generateUrl('back')); 
        //return new Response("Déconnexion avec succès");
    }
}

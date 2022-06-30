<?php

namespace App\Controller;

use App\Service\MailerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontController extends AbstractController
{
    #[Route('/front', name: 'app_front')]
    public function index(MailerService $monMailer): Response
    {
       // $monMailer->sendEmail();
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    #[Route('/devise', name: 'devise')]
    public function devise(Request $request): Response
    {
        $result="";
        if($request->getMethod()=="POST")
        {
            $montant = $request->get('montant');
            $deviseDepart = $request->get('monnaieDepart');
            $deviseCible = $request->get('monnaieCible');
            $result =  $montant*3;
            //return new Response("Vous avez cliquer sur devise : ". $montant." ".$deviseDepart." ". $deviseCible);
        }
        return $this->render('front/devise.html.twig', [
            'controller_name' => 'FrontController',
            'result'=>$result
        ]);
    }

    #[Route('/dashboardClient', name: 'dashboardClient')]
    public function dashboardClient(): Response
    {
       // $monMailer->sendEmail();
        return $this->render('front/client.html.twig', [
        ]);
    }

    #[Route('/dashboardAdmin', name: 'dashboardAdmin')]
    public function dashboardAdmin(): Response
    {
       // $monMailer->sendEmail();
        return $this->render('front/admin.html.twig', [
        ]);
    }
}

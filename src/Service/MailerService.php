<?php
namespace App\Service;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;

class MailerService
{
    private  $mailer;
    public function __construct(MailerInterface $mail) { // injection de dependences
    $this->mailer =  $mail;
    }
    public function sendEmail($nom,$prenom,$username): void
    {
     

        //$email = (new Email())
        $email = (new TemplatedEmail())
            ->from('amine.mezghich@gmail.com')
            //->to('ma.mezghich@smart-it-partner.com')
            ->to($username)
            ->subject("Confirmation de reception de Demande")
           // ->html("Votre demande a été bien reçu");
           // pass variables (name => value) to the template
            ->context([
                'expiration_date' => new \DateTime('+7 days'),
                'nom' => $nom,
                'prenom' => $prenom,
                'username' => $username,
            ])
            ->htmlTemplate('emails/signup.html.twig');
             $this->mailer->send($email);
    }

}
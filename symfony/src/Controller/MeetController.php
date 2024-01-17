<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetController extends AbstractController
{
    #[Route('/app_meet', name: 'app_meet')]
    public function index(): Response
    {
        // Ajoutez la logique nécessaire pour récupérer et afficher les rendez-vous depuis la base de données
        $meetings = []; // Remplacez ceci par la récupération réelle des rendez-vous

        return $this->render('meet/index.html.twig', [
            'meetings' => $meetings,
        ]);
    }
}

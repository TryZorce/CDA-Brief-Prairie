<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CustomerController extends AbstractController
{
    #[Route('/app_customer', name: 'app_customer')]
    public function index(): Response
    {
        // Ajoutez la logique nécessaire pour récupérer et afficher les clients depuis la base de données
        $customers = []; // Remplacez ceci par la récupération réelle des clients

        return $this->render('customer/index.html.twig', [
            'customers' => $customers,
        ]);
    }
}

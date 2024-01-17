<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\CustomerRepository;

class CustomerController extends AbstractController
{
    #[Route('/app_customer', name: 'app_customer')]
    public function index(CustomerRepository $customerRepository): Response
    {
      $customers = $customerRepository->findAll();
        return $this->render('customer/index.html.twig', [
            'customers' => $customers,
        ]);
    }
}

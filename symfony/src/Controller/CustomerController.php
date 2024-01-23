<?php

namespace App\Controller;

use App\Entity\Customer;
use App\Form\CustomerType;
use App\Repository\CustomerRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

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

    #[Route('/app_customer/add', name: 'app_add_customer')]
    public function addCustomer(Request $request, EntityManagerInterface $entityManager): Response
    {
        $customer = new Customer();
        $form = $this->createForm(CustomerType::class, $customer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($customer);
            $entityManager->flush();

            return $this->redirectToRoute('app_customer');
        }

        return $this->render('customer/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/app_customer/edit/{id}', name: 'app_edit_customer')]
    public function editCustomer(Request $request, EntityManagerInterface $entityManager, Customer $customer): Response
    {
        $form = $this->createForm(CustomerType::class, $customer);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_customer');
        }

        return $this->render('customer/edit.html.twig', [
            'form' => $form->createView(),
            'customer' => $customer,
        ]);
    }

    #[Route('/app_customer/delete/{id}', name: 'app_delete_customer')]
    public function deleteCustomer(EntityManagerInterface $entityManager, Customer $customer): Response
    {
        $entityManager->remove($customer);
        $entityManager->flush();

        return $this->redirectToRoute('app_customer');
    }
}

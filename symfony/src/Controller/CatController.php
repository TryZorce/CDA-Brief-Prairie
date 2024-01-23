<?php

namespace App\Controller;

use App\Entity\Pet;
use App\Form\PetType;
use App\Repository\PetRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\ORM\EntityManagerInterface;

class CatController extends AbstractController
{
    #[Route('/cats', name: 'app_cats')]
    public function index(PetRepository $petRepository): Response
    {
        $cats = $petRepository->findAll();

        return $this->render('cat/index.html.twig', [
            'controller_name' => "CatController",
            'cats' => $cats,
        ]);
    }

    #[Route('/cats/add', name: 'app_add_cat')]
    public function addCat(Request $request, EntityManagerInterface $entityManager): Response
    {
        $cat = new Pet();
        $form = $this->createForm(PetType::class, $cat);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($cat);
            $entityManager->flush();

            return $this->redirectToRoute('app_cats');
        }

        return $this->render('cat/add.html.twig', [
            'controller_name' => "CatController",
            'form' => $form->createView(),
        ]);
    }

    #[Route('/cats/edit/{id}', name: 'app_edit_cat')]
    public function editCat(Request $request, EntityManagerInterface $entityManager, Pet $cat): Response
    {
        $form = $this->createForm(PetType::class, $cat);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_cats');
        }

        return $this->render('cat/edit.html.twig', [
            'controller_name' => "CatController",
            'form' => $form->createView(),
            'cat' => $cat,
        ]);
    }


    #[Route('/cats/delete/{id}', name: 'app_delete_cat')]
    public function deleteCat(EntityManagerInterface $entityManager, Pet $cat): Response
    {
        $meets = $cat->getMeets();

        if (!$meets->isEmpty()) {
            $this->addFlash('error', 'Impossible de supprimer ce chat car il a des rendez-vous.');
        } else {
            $entityManager->remove($cat);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_cats');
    }

}
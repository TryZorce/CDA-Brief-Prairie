<?php

namespace App\Controller;

use App\Entity\Meet;
use App\Form\MeetType;
use App\Repository\MeetRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeetController extends AbstractController
{
    #[Route('/app_meet', name: 'app_meet')]
    public function index(MeetRepository $meetRepository): Response
    {
        $meets = $meetRepository->findAll();
        return $this->render('meet/index.html.twig', [
            'meets' => $meets,
        ]);
    }

    #[Route('/app_meet/add', name: 'app_add_meet')]
    public function addMeet(Request $request, EntityManagerInterface $entityManager): Response
    {
        $meet = new Meet();
        $form = $this->createForm(MeetType::class, $meet);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($meet);
            $entityManager->flush();

            return $this->redirectToRoute('app_meet');
        }

        return $this->render('meet/add.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    #[Route('/app_meet/edit/{id}', name: 'app_edit_meet')]
    public function editMeet(Request $request, EntityManagerInterface $entityManager, Meet $meet): Response
    {
        $form = $this->createForm(MeetType::class, $meet);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_meet');
        }

        return $this->render('meet/edit.html.twig', [
            'form' => $form->createView(),
            'meet' => $meet,
        ]);
    }

    #[Route('/app_meet/delete/{id}', name: 'app_delete_meet')]
    public function deleteMeet(EntityManagerInterface $entityManager, Meet $meet): Response
    {
        $entityManager->remove($meet);
        $entityManager->flush();

        return $this->redirectToRoute('app_meet');
    }
}

<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PetRepository;

class CatController extends AbstractController
{
    #[Route('/app_cat', name: 'app_cat')]
    public function index(PetRepository $petRepository): Response
    {
        $cats = $petRepository->findAll();
        return $this->render('cat/index.html.twig', [
            'cats' => $cats,
        ]);
    }
}

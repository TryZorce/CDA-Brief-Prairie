<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\MeetRepository;

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
}

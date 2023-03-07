<?php

namespace App\Controller;

use App\Entity\Pilotes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Component\HttpFoundation\JsonResponse;

class RaceController extends AbstractController
{
    #[Route('/race', name: 'app_race')]
    public function show(ManagerRegistry $doctrine): Response
    {
        $pilotes = $doctrine->getRepository(Pilotes::class)->findAll();
        return $this->render('race/index.html.twig', [
            'controller_name' => 'RaceController',
            'pilotes' => $pilotes
        ]);
    }

    #[Route('/race2', name: 'app_race2')]
    public function getDataAction(ManagerRegistry $doctrine): Response
{
    $pilotes = $doctrine->getRepository(Pilotes::class)->findAll();

    return new JsonResponse($pilotes);
    var_dump($pilotes);
}
}

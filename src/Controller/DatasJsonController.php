<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Pilotes;
use Doctrine\Persistence\ManagerRegistry;

class DatasJsonController extends AbstractController
{
    #[Route('/datas/json', name: 'app_datas_json')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $pilotes = $doctrine->getRepository(Pilotes::class)->findAll();
        return $this->render('datas_json/index.html.twig', [
            'controller_name' => 'DatasJsonController',
        ]);
    }
}

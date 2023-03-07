<?php

namespace App\Controller;

use App\Entity\Pilotes;
use App\Entity\Cars;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/home', name: 'app_home')]
    public function index(ManagerRegistry $doctrine): Response
    {
        $pilotes = $doctrine->getRepository(Pilotes::class)->findAll();
        $cars = $doctrine->getRepository(Cars::class)->findAll();      

        return $this->render('home/index.html.twig', [
            'controller_name' => 'HomeController',
            'pilotes' => $pilotes,
            'cars' => $cars
        ]);
    }
}

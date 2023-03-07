<?php

namespace App\Controller;

use App\Entity\Cars;
use App\Entity\Pilotes;
use App\Repository\PilotesRepository;
use App\Form\CarsFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

class CarsController extends AbstractController
{
    //#[Route('/cars', name: 'app_cars')]
    #[Route('/cars/{id}', name: 'app_cars',methods: ['GET', 'POST'])]
    public function index(Request $request, EntityManagerInterface $entityManager, int $id = null): Response
    {

        $cars = new Cars();
        $form = $this->createForm(CarsFormType::class, $cars);
        $form->handleRequest($request);

        

        if ($form->isSubmitted() && $form->isValid()){

            $pilotes = $entityManager->getRepository(Pilotes::class)->find($id);
            $cars->setPilotes($pilotes);
        
            $entityManager->persist($cars);
            $entityManager->flush();

            $cars = $entityManager->getRepository(Cars::class)->find($id);
            $pilotes->setCars($cars);
            
            $entityManager->flush();


            return $this->redirectToRoute('app_home');
        }

        return $this->render('cars/index.html.twig', [
           'form' => $form->createView()
        ]);
    }
}

<?php

namespace App\Controller;

use App\Entity\Pilotes;
use App\Form\PilotesFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;



class PilotesController extends AbstractController
{
    #[Route('/pilotes', name: 'app_pilotes')]
    public function index(Request $request, 
    EntityManagerInterface $entityManager,
    Pilotes                $pilotes = null
    
    ): Response
    {

        $pilotes = new Pilotes();
        $form = $this->createForm(PilotesFormType::class, $pilotes);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($pilotes);
            $entityManager->flush();

            $idPilotes = $pilotes->getId();
            $url =  $this->generateUrl('app_cars', array('id' => $idPilotes));
            $response = new RedirectResponse($url);
            return $response;
        }

        return $this->render('pilotes/index.html.twig', [
           'form' => $form->createView()
        ]);
    }
}
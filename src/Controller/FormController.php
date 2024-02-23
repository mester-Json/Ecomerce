<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Produit;
use App\Form\ProduitsType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;

class FormController extends AbstractController
{
    #[Route('/form', name: 'app_form')]
    public function creat(Request $request, EntityManagerInterface $em): Response
    {
        $person = new Produit();
        $form = $this->createForm(ProduitsType::class, $person);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $em->persist($person);
            $em->flush();

            return $this->redirectToRoute('book_add');
        }

        return $this->render('form/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}

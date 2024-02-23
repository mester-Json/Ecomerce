<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\ProduitRepository;

class ProduitsController extends AbstractController
{
    #[Route('/book/{id}', name: 'book_detail')]
    public function bookDetail(ProduitRepository $produitRepository, $id): Response
    {
        $produit = $produitRepository->find($id);

        if (!$produit) {
            throw $this->createNotFoundException('Le livre demandé n\'existe pas');
        }

        return $this->render('book/index.html.twig', [
            'Produits' => $produit,
        ]);
    }
}

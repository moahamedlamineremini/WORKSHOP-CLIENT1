<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Service\WooCommerceService;

class ShopController extends AbstractController
{
    private $wooCommerceService;

    public function __construct(WooCommerceService $wooCommerceService)
    {
        $this->wooCommerceService = $wooCommerceService;
    }

    public function listProducts(): Response
    {
        // Récupère la liste des produits via l'API WooCommerce
        $products = $this->wooCommerceService->getProducts();

        // Retourne une réponse avec la liste des produits (affichage simple JSON)
        return $this->json($products);
    }

    public function addProduct(Request $request): Response
    {
        // Récupère les données du produit depuis la requête
        $productData = json_decode($request->getContent(), true);

        // Ajoute le produit via l'API WooCommerce
        $newProduct = $this->wooCommerceService->addProduct($productData);

        // Retourne une réponse avec le nouveau produit (affichage simple JSON)
        return $this->json($newProduct, Response::HTTP_CREATED);
    }
}

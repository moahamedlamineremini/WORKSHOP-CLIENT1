<?php

namespace App\Controller;

use App\Entity\Produit; // Assure-toi que l'entité Produit existe
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\WooCommerceService;
use App\src\Controller\ApiProduitController;

class AddProductWoo extends AbstractController
{

    public function sendProduitsToWooCommerce(EntityManagerInterface $entityManager): JsonResponse
    {
        $url = 'https://api-retrometroid.devprod.fr/wp-json/wc/v3/products';
        $consumer_key = 'ck_bb8f230364904539050fff1a5b157f7378a00949';
        $consumer_secret = 'cs_1891b02d5b3cd3952c4c2e779c987a42284205c7';

        // Récupérer tous les produits de la base de données
        $produits = $entityManager->getRepository(Produit::class)->findAll();
        $responses = [];


        foreach ($produits as $produit) {
            $lastProductId = 0;
            $data = [
                'name' => $produit->getNom(),
                'regular_price' => (string) $produit->getPrixBase(), // Convertir en string
                'description' => $produit->getDescription(),
                'stock_quantity' => 1,
                'manage_stock' => true,
                'images' => [
                    [
                        'src' => "https://api-retrometroid.devprod.fr/wp-content/uploads/2024/09/Retro-Game-Wallpaper-3.jpeg"
                    ]
                ]
            ];


            // Set up the cURL request
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_USERPWD, $consumer_key . ':' . $consumer_secret);
            curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
            curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

            // Disable SSL verification (Not recommended for production)
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

            $response = curl_exec($ch);

// Afficher la réponse brute pour le débogage


// Vérification des erreurs cURL
if (curl_errno($ch)) {
    $responses[] = ['error' => curl_error($ch)];
} else {
    $responseData = json_decode($response, true);
    $responses[] = $responseData;

    if (isset($responseData['id'])) {
        $lastProductId = $responseData['id'];
    } else {
        $responses[] = ['error' => 'Aucun ID de produit retourné', 'data' => $data];
    }
}
curl_close($ch);
}
        // Ajouter l'ID du dernier produit à la réponse
    return new JsonResponse([
        'responses' => $responses,
        'last_product_id' => $lastProductId
    ]);
    }




    #[Route('/api/ajouter-produit', name: 'ajouter_produit', methods: ['POST'])]
    public function ajouterProduit(Request $request, EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupération des données envoyées par Vue.js
        $donnees = json_decode($request->getContent(), true);

        // Création d'une nouvelle instance de Produit (entité Doctrine)
        $produit = new Produit();
        $produit->setProduitId($donnees['produit_id']);
        $produit->setNom($donnees['nom']);
        $produit->setPrixBase($donnees['prix_base']); // Assure-toi que l'entité a un champ prixBase
        $produit->setDescription($donnees['description']); // Et un champ description

        // Enregistrement dans la base de données avec Doctrine
        $entityManager->persist($produit);
        $entityManager->flush();


// Envoyer le produit à l'API WooCommerce via la fonction sendProduitsToWooCommerce
$response = $this->sendProduitsToWooCommerce($entityManager);

        // Retourner une réponse au client Vue.js
        return new JsonResponse(['message' => 'Produit ajouté avec succès', 'wooCommerceResponse' => $response]);
    }
}

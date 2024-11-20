<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Produit; // Assurez-vous d'importer l'entité Produit
use GuzzleHttp\Exception\RequestException;
use Nelmio\ApiDocBundle\Annotation\Model;

class ApiProduitController extends AbstractController
{
    /**
     * @Route("/api/produits", name="api_produits_list", methods={"GET"})
     * @OA\Post(
 *     path="/api/produits",
 *     summary="Ajouter un nouveau produit",
 *     @OA\RequestBody(
 *         required=true,
 *         @OA\JsonContent(
 *             @OA\Property(property="nom", type="string", description="Nom du produit"),
 *             @OA\Property(property="prix_base", type="number", format="float", description="Prix du produit"),
 *             @OA\Property(property="description", type="string", description="Description du produit")
 *         )
 *     ),
 *     @OA\Response(
 *         response=201,
 *         description="Produit créé avec succès"
 *     )
 * )
 * @OA\Tag(name="Produits")
 */
     
    public function listProduits(EntityManagerInterface $entityManager): JsonResponse
    {
        // Récupérer tous les produits de la base de données
        $produits = $entityManager->getRepository(Produit::class)->findAll();

        // Transformer les entités en tableau associatif
        $data = [];
        foreach ($produits as $produit) {
            $data[] = [
                'id' => $produit->getProduitId(),
                'nom' => $produit->getNom(),
                'prix_base' => $produit->getPrixBase(),
                'description' => $produit->getDescription(),
                'image' => $produit->getImages(),
            ];
        }

        // Récupérer le dernier produit
        $dernierProduit = end($data);

        return new JsonResponse($dernierProduit);
    }

    /**
     * @Route("/api/produits/send", name="api_produits_send", methods={"POST"})
     */
       
    public function sendProduitsToWooCommerce(EntityManagerInterface $entityManager): JsonResponse
    {
        $url = 'https://api-retrometroid.devprod.fr/wp-json/wc/v3/products';
        $consumer_key = 'ck_bb8f230364904539050fff1a5b157f7378a00949';
        $consumer_secret = 'cs_1891b02d5b3cd3952c4c2e779c987a42284205c7';
    
        // Récupérer le dernier produit de la base de données
        $produit = $entityManager->getRepository(Produit::class)->findOneBy([], ['id' => 'DESC']);
        $responses = [];
        $lastProductId = null;
    
        if ($produit) {
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
    
            if (curl_errno($ch)) {
                $responses[] = ['error' => curl_error($ch)];
            } else {
                $responseData = json_decode($response, true);
                $responses[] = $responseData;
    
                // Récupérer l'ID du produit ajouté en dernier
                if (isset($responseData['id'])) {
                    $lastProductId = $responseData['id']; // Mettre à jour l'ID du dernier produit
                }
            }
    
            curl_close($ch);
        }
    
        // Ajouter l'ID du dernier produit à la réponse
        return new JsonResponse([
            'responses' => $responses,
            'last_product_id' => $lastProductId
        ]);
    }}

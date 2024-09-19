<?php

namespace App\Service;

use Symfony\Contracts\HttpClient\HttpClientInterface;

class WooCommerceService
{
    private $client;
    private $apiUrl;
    private $consumerKey;
    private $consumerSecret;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
        $this->apiUrl = 'https://api-retrometroid.devprod.fr/wp-json/wc/v3/';
        $this->consumerKey = 'ck_bb8f230364904539050fff1a5b157f7378a00949';
        $this->consumerSecret = 'cs_1891b02d5b3cd3952c4c2e779c987a42284205c7';
    }

    public function getProducts()
    {
        // Appel GET à l'API pour récupérer les produits
        $response = $this->client->request('GET', $this->apiUrl . 'products', [
            'auth_basic' => [$this->consumerKey, $this->consumerSecret],
        ]);

        // Retourne les données en tableau PHP
        return $response->toArray();
    }

    public function addToCart($productId, $quantity)
    {
        // Appel POST à l'API pour ajouter un produit au panier
        $response = $this->client->request('POST', $this->apiUrl . 'cart', [
            'auth_basic' => [$this->consumerKey, $this->consumerSecret],
            'json' => [
                'product_id' => $productId,
                'quantity' => $quantity
            ]
        ]);

        // Retourne les données de la réponse
        return $response->toArray();
    }
}

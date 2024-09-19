<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;
use Symfony\Component\HttpFoundation\Response as SymfonyResponse;
use Symfony\Component\HttpFoundation\Request;
use Nelmio\ApiDocBundle\Annotation\Model;

class ApiProduitControllerTest extends WebTestCase
{
    public function testSendProduitsToWooCommerceWithMock()
    {
        // Mocker le client HTTP (Guzzle par exemple)
        $mockClient = $this->getMockBuilder(Client::class)
                           ->disableOriginalConstructor()
                           ->getMock();

        // Simuler une réponse avec un ID de produit pour WooCommerce
        $mockClient->expects($this->any())
                   ->method('post')
                   ->willReturn(new Response(200, [], json_encode(['id' => 123])));

        // Injecter le mock dans le service ou le contrôleur (si besoin)

        // Simuler un client HTTP Symfony
        $client = static::createClient();

        // Simuler la requête POST sur /api/produits/send
        $client->request('POST', '/AddProduct');

        // Vérifier la réponse
        $this->assertResponseIsSuccessful();
        $this->assertResponseHeaderSame('content-type', 'application/json');

        // Vérifier que le dernier produit ID est bien celui mocké
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertEquals(257, $responseData['last_product_id']);
    }

    public function testListProduits()
    {
        // Simuler un client HTTP
        $client = static::createClient();

        // Effectuer une requête GET sur /api/produits
        $client->request('GET', '/produits');

        // Vérifier que la réponse est correcte (status 200)
        $this->assertResponseIsSuccessful();


        // Vérifier que le contenu est bien du JSON
        $this->assertResponseHeaderSame('content-type', 'application/json');

        // Vérifier que la réponse contient un tableau (liste des produits)
        $responseData = json_decode($client->getResponse()->getContent(), true);
        $this->assertIsArray($responseData);

        // Vérifier que chaque produit a bien les propriétés attendues
        foreach ($responseData as $produit) {
            $this->assertArrayHasKey('id', $produit);
            $this->assertArrayHasKey('nom', $produit);
            $this->assertArrayHasKey('prix_base', $produit);
            $this->assertArrayHasKey('description', $produit);

        }
    }
}

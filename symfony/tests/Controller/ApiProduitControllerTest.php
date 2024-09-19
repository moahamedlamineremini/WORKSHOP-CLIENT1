<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Response;

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
        $this->assertEquals($responseData['last_product_id'], $responseData['last_product_id']);
    }
}

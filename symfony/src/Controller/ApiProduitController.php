<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Produit; // Assurez-vous d'importer l'entité Produit
use App\Entity\Couleur; // Assurez-vous d'importer l'entité Couleur
use App\Entity\Image; // Assurez-vous d'importer l'entité Image

class ApiProduitController extends AbstractController
{
    /**
     * @Route("/api/produits", name="api_produits_list", methods={"GET"})
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
            'produitConfigurations' => $produit->getProduitConfigurations()
            ];
        }

        // Récupérer toutes les couleurs de la base de données
        $couleurs = $entityManager->getRepository(Couleur::class)->findAll();

        // Transformer les entités en tableau associatif
        $couleursData = [];
        foreach ($couleurs as $couleur) {
            $couleursData[] = [
            'id' => $couleur->getId(),
            'nom' => $couleur->getNom(),
            'code_hex' => $couleur->getCodeHex(),
        
            // Ajoutez ici tous les autres attributs de la table Couleur
            ];
        }

        //Récupérer toutes les images de la base de données
        $images = $entityManager->getRepository(Image::class)->findAll();
        $imagesData = [];
        foreach ($images as $image) {
            $imagesData[] = [
            'image_id' => $image->getImageId(),
            'produit_id_id' => $image->getProduitId(),
            'type_element' => $image->getTypeElement(),
            'vue' => $image->getVue(),
            'couleur_id_id' => $image->getCouleurId(),
            'url_image' => $image->getUrlImage(),
            'image_file' => $image->getImageFile(),
            ];
        }

        // Combiner les données des produits et des couleurs
        $data = [
            'produits' => $data,
            'couleurs' => $couleursData,
            'images' => $imagesData
        ];

        // Retourner les données sous forme de JSON
        return new JsonResponse($data);
    }
}
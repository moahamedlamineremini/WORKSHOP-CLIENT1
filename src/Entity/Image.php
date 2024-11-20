<?php

namespace App\Entity;

use App\Repository\ImageRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ImageRepository::class)]
// pour ajouter a l'api platform
#[ApiResource]
class Image
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $image_id = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    private ?produit $produit_id = null;

    #[ORM\Column(length: 255)]
    private ?string $type_element = null;

    #[ORM\Column(length: 255)]
    private ?string $vue = null;

    #[ORM\ManyToOne(inversedBy: 'images')]
    #[ORM\JoinColumn(nullable: false)]
    private ?couleur $couleur_id = null;

    #[ORM\Column(length: 255)]
    private ?string $url_image = null;

    #[ORM\Column(length: 255)]
    private ?string $image_file = null;



    public function getImageId(): ?int
    {
        return $this->id;
    }

    public function setImageId(int $image_id): static
    {
        $this->image_id = $image_id;

        return $this;
    }

    public function getProduitId(): ?produit
    {
        return $this->produit_id;
    }

    public function setProduitId(?produit $produit_id): static
    {
        $this->produit_id = $produit_id;

        return $this;
    }

    public function getTypeElement(): ?string
    {
        return $this->type_element;
    }

    public function setTypeElement(string $type_element): static
    {
        $this->type_element = $type_element;

        return $this;
    }

    public function getVue(): ?string
    {
        return $this->vue;
    }

    public function setVue(string $vue): static
    {
        $this->vue = $vue;

        return $this;
    }

    public function getCouleurId(): ?couleur
    {
        return $this->couleur_id;
    }

    public function setCouleurId(?couleur $couleur_id): static
    {
        $this->couleur_id = $couleur_id;

        return $this;
    }

    public function getUrlImage(): ?string
    {
        return $this->url_image;
    }

    public function setUrlImage(string $url_image): static
    {
        $this->url_image = $url_image;

        return $this;
    }

    public function getImageFile(): ?string
    {
        return $this->image_file;
    }

    public function setImageFile(string $image_file): static
    {
        $this->image_file = $image_file;

        return $this;
    }
}

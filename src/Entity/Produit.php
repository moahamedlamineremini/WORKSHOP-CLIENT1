<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ProduitRepository::class)]
// pour ajouter a l'api platform
#[ApiResource]
class Produit
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;


    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $produit_id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $prix_base = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $description = null;

    /**
     * @var Collection<int, Image>
     */
    #[ORM\OneToMany(targetEntity: Image::class, mappedBy: 'produit_id')]
    private Collection $images;

    /**
     * @var Collection<int, ProduitConfiguration>
     */
    #[ORM\OneToMany(targetEntity: ProduitConfiguration::class, mappedBy: 'produit_id')]
    private Collection $produitConfigurations;

    public function __construct()
    {
        $this->images = new ArrayCollection();
        $this->produitConfigurations = new ArrayCollection();
    }



    public function getProduitId(): ?int
    {
        return $this->produit_id;
    }

    public function setProduitId(int $produit_id): static
    {
        $this->produit_id = $produit_id;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): static
    {
        $this->nom = $nom;

        return $this;
    }

    public function getPrixBase(): ?int
    {
        return $this->prix_base;
    }

    public function setPrixBase(int $prix_base): static
    {
        $this->prix_base = $prix_base;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(?string $description): static
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return Collection<int, Image>
     */
    public function getImages(): Collection
    {
        return $this->images;
    }

    public function addImage(Image $image): static
    {
        if (!$this->images->contains($image)) {
            $this->images->add($image);
            $image->setProduitId($this);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getProduitId() === $this) {
                $image->setProduitId(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, ProduitConfiguration>
     */
    public function getProduitConfigurations(): Collection
    {
        return $this->produitConfigurations;
    }

    public function addProduitConfiguration(ProduitConfiguration $produitConfiguration): static
    {
        if (!$this->produitConfigurations->contains($produitConfiguration)) {
            $this->produitConfigurations->add($produitConfiguration);
            $produitConfiguration->setProduitId($this);
        }

        return $this;
    }

    public function removeProduitConfiguration(ProduitConfiguration $produitConfiguration): static
    {
        if ($this->produitConfigurations->removeElement($produitConfiguration)) {
            // set the owning side to null (unless already changed)
            if ($produitConfiguration->getProduitId() === $this) {
                $produitConfiguration->setProduitId(null);
            }
        }

        return $this;
    }
}

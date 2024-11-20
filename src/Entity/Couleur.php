<?php

namespace App\Entity;

use App\Repository\CouleurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: CouleurRepository::class)]
// pour ajouter a l'api platform
/**
 * @ApiResource
 * @ORM\Entity
 */
#[ApiResource]
class Couleur
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[ORM\GeneratedValue]
    private ?int $couleur_id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 8)]
    private ?string $code_hex = null;

    /**
     * @var Collection<int, Coque>
     */
    #[ORM\ManyToMany(targetEntity: coque::class, mappedBy: 'couleur_id')]
    private Collection $coques;

    /**
     * @var Collection<int, Image>
     */
    #[ORM\OneToMany(targetEntity: Image::class, mappedBy: 'couleur_id')]
    private Collection $images;

    /**
     * @var Collection<int, ProduitConfiguration>
     */
    #[ORM\OneToMany(targetEntity: ProduitConfiguration::class, mappedBy: 'ecran_ips_id')]
    private Collection $produitConfigurations;

    public function __construct()
    {
        $this->coques = new ArrayCollection();
        $this->images = new ArrayCollection();
        $this->produitConfigurations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCouleurId(): ?int
    {
        return $this->couleur_id;
    }

    public function setCouleurId(int $couleur_id): static
    {
        $this->couleur_id = $couleur_id;

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

    public function getCodeHex(): ?string
    {
        return $this->code_hex;
    }

    public function setCodeHex(string $code_hex): static
    {
        $this->code_hex = $code_hex;

        return $this;
    }

    /**
     * @return Collection<int, Coque>
     */
    public function getCoques(): Collection
    {
        return $this->coques;
    }

    public function addCoque(Coque $coque): static
    {
        if (!$this->coques->contains($coque)) {
            $this->coques->add($coque);
            $coque->addCouleurId($this);
        }

        return $this;
    }

    public function removeCoque(Coque $coque): static
    {
        if ($this->coques->removeElement($coque)) {
            $coque->removeCouleurId($this);
        }

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
            $image->setCouleurId($this);
        }

        return $this;
    }

    public function removeImage(Image $image): static
    {
        if ($this->images->removeElement($image)) {
            // set the owning side to null (unless already changed)
            if ($image->getCouleurId() === $this) {
                $image->setCouleurId(null);
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
            $produitConfiguration->setEcranIpsId($this);
        }

        return $this;
    }

    public function removeProduitConfiguration(ProduitConfiguration $produitConfiguration): static
    {
        if ($this->produitConfigurations->removeElement($produitConfiguration)) {
            // set the owning side to null (unless already changed)
            if ($produitConfiguration->getEcranIpsId() === $this) {
                $produitConfiguration->setEcranIpsId(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\CoqueRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: CoqueRepository::class)]
// pour ajouter a l'api platform
#[ApiResource]
class coque
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $coque_id = null;

    #[ORM\Column(length: 255)]
    private ?string $type = null;

    /**
     * @var Collection<int, couleur>
     */
    #[ORM\ManyToMany(targetEntity: couleur::class, inversedBy: 'coques')]
    private Collection $couleur_id;

    #[ORM\Column(nullable: true)]
    private ?int $prix = null;

    /**
     * @var Collection<int, ProduitConfiguration>
     */
    #[ORM\OneToMany(targetEntity: ProduitConfiguration::class, mappedBy: 'coque_avant_id')]
    private Collection $produitConfigurations;

    public function __construct()
    {
        $this->couleur_id = new ArrayCollection();
        $this->produitConfigurations = new ArrayCollection();
    }


    public function getCoqueId(): ?int
    {
        return $this->coque_id;
    }

    public function setCoqueId(int $coque_id): static
    {
        $this->coque_id = $coque_id;

        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function setType(string $type): static
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return Collection<int, couleur>
     */
    public function getCouleurId(): Collection
    {
        return $this->couleur_id;
    }

    public function addCouleurId(couleur $couleurId): static
    {
        if (!$this->couleur_id->contains($couleurId)) {
            $this->couleur_id->add($couleurId);
        }

        return $this;
    }

    public function removeCouleurId(couleur $couleurId): static
    {
        $this->couleur_id->removeElement($couleurId);

        return $this;
    }

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(?int $prix): static
    {
        $this->prix = $prix;

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
            $produitConfiguration->setCoqueAvantId($this);
        }

        return $this;
    }

    public function removeProduitConfiguration(ProduitConfiguration $produitConfiguration): static
    {
        if ($this->produitConfigurations->removeElement($produitConfiguration)) {
            // set the owning side to null (unless already changed)
            if ($produitConfiguration->getCoqueAvantId() === $this) {
                $produitConfiguration->setCoqueAvantId(null);
            }
        }

        return $this;
    }
}

<?php

namespace App\Entity;

use App\Repository\AccessoireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ApiResource]
#[ORM\Entity(repositoryClass: AccessoireRepository::class)]

class Accessoire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    #[ORM\GeneratedValue]
    private ?int $accessoire_id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column]
    private ?int $prix = null;

    /**
     * @var Collection<int, ConfigurationAccessoire>
     */
    #[ORM\OneToMany(targetEntity: ConfigurationAccessoire::class, mappedBy: 'accessoire_id')]
    private Collection $configurationAccessoires;

    public function __construct()
    {
        $this->configurationAccessoires = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAccessoireId(): ?int
    {
        return $this->accessoire_id;
    }

    public function setAccessoireId(int $accessoire_id): static
    {
        $this->accessoire_id = $accessoire_id;

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

    public function getPrix(): ?int
    {
        return $this->prix;
    }

    public function setPrix(int $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    /**
     * @return Collection<int, ConfigurationAccessoire>
     */
    public function getConfigurationAccessoires(): Collection
    {
        return $this->configurationAccessoires;
    }

    public function addConfigurationAccessoire(ConfigurationAccessoire $configurationAccessoire): static
    {
        if (!$this->configurationAccessoires->contains($configurationAccessoire)) {
            $this->configurationAccessoires->add($configurationAccessoire);
            $configurationAccessoire->setAccessoireId($this);
        }

        return $this;
    }

    public function removeConfigurationAccessoire(ConfigurationAccessoire $configurationAccessoire): static
    {
        if ($this->configurationAccessoires->removeElement($configurationAccessoire)) {
            // set the owning side to null (unless already changed)
            if ($configurationAccessoire->getAccessoireId() === $this) {
                $configurationAccessoire->setAccessoireId(null);
            }
        }

        return $this;
    }
}

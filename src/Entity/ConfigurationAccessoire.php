<?php

namespace App\Entity;

use App\Repository\ConfigurationAccessoireRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use App\Entity\ProduitConfiguration; // Assurez-vous d'importer les bonnes classes.
use App\Entity\Accessoire;

#[ORM\Entity(repositoryClass: ConfigurationAccessoireRepository::class)]
#[ApiResource]
class ConfigurationAccessoire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'configurationAccessoires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProduitConfiguration $configuration_id = null;

    #[ORM\ManyToOne(inversedBy: 'configurationAccessoires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Accessoire $accessoire_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfigurationId(): ?ProduitConfiguration
    {
        return $this->configuration_id;
    }

    public function setConfigurationId(?ProduitConfiguration $configuration_id): static
    {
        $this->configuration_id = $configuration_id;

        return $this;
    }

    public function getAccessoireId(): ?Accessoire
    {
        return $this->accessoire_id;
    }

    public function setAccessoireId(?Accessoire $accessoire_id): static
    {
        $this->accessoire_id = $accessoire_id;

        return $this;
    }
}

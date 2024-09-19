<?php

namespace App\Entity;

use App\Repository\ConfigurationAccessoireRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ConfigurationAccessoireRepository::class)]
// Pour ajouter l'api platform
#[ApiResource]
class ConfigurationAccessoire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'configurationAccessoires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?produitconfiguration $configuration_id = null;

    #[ORM\ManyToOne(inversedBy: 'configurationAccessoires')]
    #[ORM\JoinColumn(nullable: false)]
    private ?accessoire $accessoire_id = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfigurationId(): ?produitconfiguration
    {
        return $this->configuration_id;
    }

    public function setConfigurationId(?produitconfiguration $configuration_id): static
    {
        $this->configuration_id = $configuration_id;

        return $this;
    }

    public function getAccessoireId(): ?accessoire
    {
        return $this->accessoire_id;
    }

    public function setAccessoireId(?accessoire $accessoire_id): static
    {
        $this->accessoire_id = $accessoire_id;

        return $this;
    }
}

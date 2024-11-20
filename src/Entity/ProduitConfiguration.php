<?php

namespace App\Entity;

use App\Repository\ProduitConfigurationRepository;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;

#[ORM\Entity(repositoryClass: ProduitConfigurationRepository::class)]
// pour ajouter a l'api platform
#[ApiResource]
class ProduitConfiguration
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?int $configuration_id = null;

    #[ORM\ManyToOne(inversedBy: 'produitConfigurations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?produit $produit_id = null;

    #[ORM\ManyToOne(inversedBy: 'produitConfigurations')]
    #[ORM\JoinColumn(nullable: false)]
    private ?coque $coque_avant_id = null;

    #[ORM\ManyToOne(inversedBy: 'produitConfigurations')]
    private ?coque $coque_arriere_id = null;

    #[ORM\ManyToOne(inversedBy: 'produitConfigurations')]
    private ?couleur $ecran_ips_id = null;

    #[ORM\ManyToOne(inversedBy: 'produitConfigurations')]
    private ?couleur $button_id = null;

    #[ORM\ManyToOne(inversedBy: 'produitConfigurations')]
    private ?couleur $pad_id = null;

    #[ORM\Column]
    private ?bool $installation_batterie = null;

    #[ORM\Column]
    private ?bool $accn = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getConfigurationId(): ?int
    {
        return $this->configuration_id;
    }

    public function setConfigurationId(int $configuration_id): static
    {
        $this->configuration_id = $configuration_id;

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

    public function getCoqueAvantId(): ?coque
    {
        return $this->coque_avant_id;
    }

    public function setCoqueAvantId(?coque $coque_avant_id): static
    {
        $this->coque_avant_id = $coque_avant_id;

        return $this;
    }

    public function getCoqueArriereId(): ?coque
    {
        return $this->coque_arriere_id;
    }

    public function setCoqueArriereId(?coque $coque_arriere_id): static
    {
        $this->coque_arriere_id = $coque_arriere_id;

        return $this;
    }

    public function getEcranIpsId(): ?couleur
    {
        return $this->ecran_ips_id;
    }

    public function setEcranIpsId(?couleur $ecran_ips_id): static
    {
        $this->ecran_ips_id = $ecran_ips_id;

        return $this;
    }

    public function getButtonId(): ?couleur
    {
        return $this->button_id;
    }

    public function setButtonId(?couleur $button_id): static
    {
        $this->button_id = $button_id;

        return $this;
    }

    public function getPadId(): ?couleur
    {
        return $this->pad_id;
    }

    public function setPadId(?couleur $pad_id): static
    {
        $this->pad_id = $pad_id;

        return $this;
    }

    public function isInstallationBatterie(): ?bool
    {
        return $this->installation_batterie;
    }

    public function setInstallationBatterie(bool $installation_batterie): static
    {
        $this->installation_batterie = $installation_batterie;

        return $this;
    }

    public function isAccn(): ?bool
    {
        return $this->accn;
    }

    public function setAccn(bool $accn): static
    {
        $this->accn = $accn;

        return $this;
    }
}

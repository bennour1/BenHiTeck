<?php

namespace App\Entity;

use App\Repository\VarianteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=VarianteRepository::class)
 */
class Variante
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $prix;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $memoire;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $core;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $espaceDisque;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $couleur;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="variantes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $produit;

    /**
     * @ORM\OneToMany(targetEntity=LigneDeCommande::class, mappedBy="variante")
     */
    private $ligneDeCommandes;

    /**
     * @ORM\Column(type="integer")
     */
    private $qteStoque;

    public function __construct()
    {
        $this->ligneDeCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): self
    {
        $this->prix = $prix;

        return $this;
    }

    public function getMemoire(): ?int
    {
        return $this->memoire;
    }

    public function setMemoire(?int $memoire): self
    {
        $this->memoire = $memoire;

        return $this;
    }

    public function getCore(): ?string
    {
        return $this->core;
    }

    public function setCore(?string $core): self
    {
        $this->core = $core;

        return $this;
    }

    public function getEspaceDisque(): ?string
    {
        return $this->espaceDisque;
    }

    public function setEspaceDisque(?string $espaceDisque): self
    {
        $this->espaceDisque = $espaceDisque;

        return $this;
    }

    public function getCouleur(): ?string
    {
        return $this->couleur;
    }

    public function setCouleur(?string $couleur): self
    {
        $this->couleur = $couleur;

        return $this;
    }

    public function getProduit(): ?Produit
    {
        return $this->produit;
    }

    public function setProduit(?Produit $produit): self
    {
        $this->produit = $produit;

        return $this;
    }

    /**
     * @return Collection|LigneDeCommande[]
     */
    public function getLigneDeCommandes(): Collection
    {
        return $this->ligneDeCommandes;
    }

    public function addLigneDeCommande(LigneDeCommande $ligneDeCommande): self
    {
        if (!$this->ligneDeCommandes->contains($ligneDeCommande)) {
            $this->ligneDeCommandes[] = $ligneDeCommande;
            $ligneDeCommande->setVariante($this);
        }

        return $this;
    }

    public function removeLigneDeCommande(LigneDeCommande $ligneDeCommande): self
    {
        if ($this->ligneDeCommandes->contains($ligneDeCommande)) {
            $this->ligneDeCommandes->removeElement($ligneDeCommande);
            // set the owning side to null (unless already changed)
            if ($ligneDeCommande->getVariante() === $this) {
                $ligneDeCommande->setVariante(null);
            }
        }

        return $this;
    }

    public function getQteStoque(): ?int
    {
        return $this->qteStoque;
    }

    public function setQteStoque(int $qteStoque): self
    {
        $this->qteStoque = $qteStoque;

        return $this;
    }
}

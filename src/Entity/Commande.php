<?php

namespace App\Entity;

use App\Repository\CommandeRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=CommandeRepository::class)
 */
class Commande
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateCommande;

    /**
     * @ORM\ManyToOne(targetEntity=Utilisateur::class, inversedBy="commandes")
     * @ORM\JoinColumn(nullable=false)
     */
    private $utilisateur;

    /**
     * @ORM\OneToOne(targetEntity=Facture::class, mappedBy="commande", cascade={"persist", "remove"})
     */
    private $facture;

    /**
     * @ORM\OneToOne(targetEntity=BonDeLivraison::class, mappedBy="commande", cascade={"persist", "remove"})
     */
    private $bonDeLivraison;

    /**
     * @ORM\OneToMany(targetEntity=LigneDeCommande::class, mappedBy="commande")
     */
    private $ligneDeCommandes;

    public function __construct()
    {
        $this->ligneDeCommandes = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateCommande(): ?\DateTimeInterface
    {
        return $this->dateCommande;
    }

    public function setDateCommande(\DateTimeInterface $dateCommande): self
    {
        $this->dateCommande = $dateCommande;

        return $this;
    }

    public function getUtilisateur(): ?Utilisateur
    {
        return $this->utilisateur;
    }

    public function setUtilisateur(?Utilisateur $utilisateur): self
    {
        $this->utilisateur = $utilisateur;

        return $this;
    }

    public function getFacture(): ?Facture
    {
        return $this->facture;
    }

    public function setFacture(Facture $facture): self
    {
        $this->facture = $facture;

        // set the owning side of the relation if necessary
        if ($facture->getCommande() !== $this) {
            $facture->setCommande($this);
        }

        return $this;
    }

    public function getBonDeLivraison(): ?BonDeLivraison
    {
        return $this->bonDeLivraison;
    }

    public function setBonDeLivraison(BonDeLivraison $bonDeLivraison): self
    {
        $this->bonDeLivraison = $bonDeLivraison;

        // set the owning side of the relation if necessary
        if ($bonDeLivraison->getCommande() !== $this) {
            $bonDeLivraison->setCommande($this);
        }

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
            $ligneDeCommande->setCommande($this);
        }

        return $this;
    }

    public function removeLigneDeCommande(LigneDeCommande $ligneDeCommande): self
    {
        if ($this->ligneDeCommandes->contains($ligneDeCommande)) {
            $this->ligneDeCommandes->removeElement($ligneDeCommande);
            // set the owning side to null (unless already changed)
            if ($ligneDeCommande->getCommande() === $this) {
                $ligneDeCommande->setCommande(null);
            }
        }

        return $this;
    }
}

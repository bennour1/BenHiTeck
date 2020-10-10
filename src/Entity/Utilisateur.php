<?php
namespace App\Entity;
use App\Repository\UtilisateurRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
// namespace pour la validation
use Symfony\Component\Validator\Constraints as Assert;
// Ajouter cette interface pour crypter mes mots de passes
use Symfony\Component\Security\Core\User\UserInterface;
// Ajouter cette contrainte pour que mon utilisateur soit unique via l'adresse email
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
/**
 * @ORM\Entity(repositoryClass=UtilisateurRepository::class)
 * @UniqueEntity(
 *     fields={"email"},
 *     message="L'email que vous avez indiqué est déjà utilisé !"
 * )
 */
class Utilisateur implements UserInterface
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,
     *      max=50,
     *     minMessage="Il faut un nom plus que 3 caractères",
     *     maxMessage="Il faut un nom moin que 5O caractères")
     */
    private $nomUtilisateur;
    //, nullable=true
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3,
     *      max=50,
     *     minMessage="Il faut un nom plus que 3 caractères",
     *     maxMessage="Il faut un nom moin que 5O caractères")
     */
    private $prenomUtilisateur;
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDeNaissance;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $adresse;
    /**
     * @ORM\ManyToOne(targetEntity=Ville::class, inversedBy="utilisateurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $ville;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Email(message = "Adresse email '{{ value }}' n'est pas validé")
     */
    private $email;
    /**
     * @ORM\Column(type="string", length=255)
     * @Assert\Length(min=3, minMessage="Votre mot de passe doit faire minimum 3 caractères")
     * @Assert\EqualTo(propertyPath="confirmationMDP", message="Vous n'avez pas tappé le même mot de passe")
     */
    private $motDePasse;
    /**
     * @Assert\EqualTo(propertyPath="motDePasse", message="Vous n'avez pas tappé le même mot de passe")
     */
    private $confirmationMDP;
    /**
     * @return mixed
     */
    public function getConfirmationMDP()
    {
        return $this->confirmationMDP;
    }
    /**
     * @param mixed $confirmationMDP
     */
    public function setConfirmationMDP($confirmationMDP): void
    {
        $this->confirmationMDP = $confirmationMDP;
    }
    /**
     * @ORM\Column(type="date")
     */
    private $dateAjout;
    /**
     * @ORM\Column(type="string", length=50)
     */
    private $activationCompte;
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateDesactivation;
    /**
     * @ORM\OneToMany(targetEntity=Commande::class, mappedBy="utilisateur")
     */
    private $commandes;
    /**
     * @ORM\Column(type="string", length=255)
     */
    private $telephone;
    public function __construct()
    {
        $this->commandes = new ArrayCollection();
    }
    public function getId(): ?int
    {
        return $this->id;
    }
    public function getNomUtilisateur(): ?string
    {
        return $this->nomUtilisateur;
    }
    public function setNomUtilisateur(string $nomUtilisateur): self
    {
        $this->nomUtilisateur = $nomUtilisateur;
        return $this;
    }
    public function getPrenomUtilisateur(): ?string
    {
        return $this->prenomUtilisateur;
    }
    public function setPrenomUtilisateur(?string $prenomUtilisateur): self
    {
        $this->prenomUtilisateur = $prenomUtilisateur;
        return $this;
    }
    public function getDateDeNaissance(): ?\DateTimeInterface
    {
        return $this->dateDeNaissance;
    }
    public function setDateDeNaissance(\DateTimeInterface $dateDeNaissance): self
    {
        $this->dateDeNaissance = $dateDeNaissance;
        return $this;
    }
    public function getAdresse(): ?string
    {
        return $this->adresse;
    }
    public function setAdresse(string $adresse): self
    {
        $this->adresse = $adresse;
        return $this;
    }
    public function getVille(): ?Ville
    {
        return $this->ville;
    }
    public function setVille(?Ville $ville): self
    {
        $this->ville = $ville;
        return $this;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }
    public function getMotDePasse(): ?string
    {
        return $this->motDePasse;
    }
    public function setMotDePasse(string $motDePasse): self
    {
        $this->motDePasse = $motDePasse;
        return $this;
    }
    public function getDateAjout(): ?\DateTimeInterface
    {
        return $this->dateAjout;
    }
    public function setDateAjout(\DateTimeInterface $dateAjout): self
    {
        $this->dateAjout = $dateAjout;
        return $this;
    }
    public function getActivationCompte(): ?string
    {
        return $this->activationCompte;
    }
    public function setActivationCompte(string $activationCompte): self
    {
        $this->activationCompte = $activationCompte;
        return $this;
    }
    public function getDateDesactivation(): ?\DateTimeInterface
    {
        return $this->dateDesactivation;
    }
    public function setDateDesactivation(?\DateTimeInterface $dateDesactivation): self
    {
        $this->dateDesactivation = $dateDesactivation;
        return $this;
    }
    /**
     * @return Collection|Commande[]
     */
    public function getCommandes(): Collection
    {
        return $this->commandes;
    }
    public function addCommande(Commande $commande): self
    {
        if (!$this->commandes->contains($commande)) {
            $this->commandes[] = $commande;
            $commande->setUtilisateur($this);
        }
        return $this;
    }
    public function removeCommande(Commande $commande): self
    {
        if ($this->commandes->contains($commande)) {
            $this->commandes->removeElement($commande);
            // set the owning side to null (unless already changed)
            if ($commande->getUtilisateur() === $this) {
                $commande->setUtilisateur(null);
            }
        }
        return $this;
    }
    public function getTelephone(): ?string
    {
        return $this->telephone;
    }
    public function setTelephone(string $telephone): self
    {
        $this->telephone = $telephone;
        return $this;
    }
    public function getRoles()
    {
        return ['ROLE_USER'];
    }
    public function getPassword()
    {
        return $this->motDePasse;
    }
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
    }
    public function getUsername()
    {
        return $this->email;
    }
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.
    }
}
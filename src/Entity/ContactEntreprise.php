<?php

namespace App\Entity;

use App\Repository\ContactEntrepriseRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Mime\Message;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Component\Validator\Context\ExecutionContextInterface;

#[ORM\Entity(repositoryClass: ContactEntrepriseRepository::class)]
class ContactEntreprise
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $nom = null;

    #[ORM\Column(length: 255)]
    private ?string $prenom = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(message: "Cet adresse mail est invalide")]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\Regex('#^(?:(?:\+|00)33[\s.-]{0,3}(?:\(0\)[\s.-]{0,3})?|0)[1-9](?:(?:[\s.-]?\d{2}){4}|\d{2}(?:[\s.-]?\d{3}){2})$#', message: "Ce numéro est invalide")]
    private ?string $numTel = null;

    #[ORM\Column(length: 255)]
    private ?string $nomEntreprise = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message: "Veuillez sélectionner la raison de votre message")]
    private ?string $raison = null;

    #[ORM\Column(length: 800)]
    private ?string $message = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $dateEnvoi = null;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getPrenom(): ?string
    {
        return $this->prenom;
    }

    public function setPrenom(string $prenom): static
    {
        $this->prenom = $prenom;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getNumTel(): ?string
    {
        return $this->numTel;
    }

    public function setNumTel(string $numTel): static
    {
        $this->numTel = $numTel;

        return $this;
    }

    public function getNomEntreprise(): ?string
    {
        return $this->nomEntreprise;
    }

    public function setNomEntreprise(string $nomEntreprise): static
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    public function getRaison(): ?string
    {
        return $this->raison;
    }

    public function setRaison(string $raison): static
    {
        $this->raison = $raison;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getDateEnvoi(): ?\DateTimeInterface
    {
        return $this->dateEnvoi;
    }

    public function setDateEnvoi(\DateTimeInterface $dateEnvoi): static
    {
        $this->dateEnvoi = $dateEnvoi;

        return $this;
    }

    #[Assert\Callback]
    public function validateFields(ExecutionContextInterface $context): void
    {
        if (empty($this->nom) || empty($this->prenom) || empty($this->nomEntreprise) || empty($this->numTel) || empty($this->email) || empty($this->message) || empty($this->raison)) {
            $context->buildViolation('Veuillez remplir tous les champs')->atPath(ContactEntreprise::class)->addViolation();
        }
    }
}

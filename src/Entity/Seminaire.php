<?php

namespace App\Entity;

use App\Repository\SeminaireRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

#[ORM\Entity(repositoryClass: SeminaireRepository::class)]
#[Vich\Uploadable]
class Seminaire
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(length: 800)]
    private ?string $descriptionStructure = null;

    #[ORM\Column(length: 800)]
    private ?string $descriptionEquipement = null;

    #[Vich\UploadableField(mapping: 'seminaires', fileNameProperty: 'imageStructure', size: 'imageStructureSize')]
    private ?File $imageStructureFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageStructure = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageStructureSize = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $structureUpdatedAt = null;

    #[Vich\UploadableField(mapping: 'seminaires', fileNameProperty: 'imageEquipement', size: 'imageEquipementSize')]
    private ?File $imageEquipementFile = null;

    #[ORM\Column(nullable: true)]
    private ?string $imageEquipement = null;

    #[ORM\Column(nullable: true)]
    private ?int $imageEquipementSize = null;

    #[ORM\Column(nullable: true)]
    private ?\DateTimeImmutable $equipementUpdatedAt = null;

    /**
     * @var Collection<int, Entreprise>
     */
    #[ORM\ManyToMany(targetEntity: Entreprise::class, mappedBy: 'seminaires')]
    private Collection $entreprises;

    public function __construct()
    {
        $this->entreprises = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescriptionStructure(): ?string
    {
        return $this->descriptionStructure;
    }

    public function setDescriptionStructure(string $descriptionStructure): static
    {
        $this->descriptionStructure = $descriptionStructure;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageStructureFile
     */
    public function setImageStructureFile(?File $imageStructureFile = null): void
    {
        $this->imageStructureFile = $imageStructureFile;

        if (null !== $imageStructureFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->structureUpdatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageStructureFile(): ?File
    {
        return $this->imageStructureFile;
    }

    public function setImageStructure(?string $imageStructure): void
    {
        $this->imageStructure = $imageStructure;
    }

    public function getImageStructure(): ?string
    {
        return $this->imageStructure;
    }

    public function setImageStructureSize(?int $imageStructureSize): void
    {
        $this->imageStructureSize = $imageStructureSize;
    }

    public function getImageStructureSize(): ?int
    {
        return $this->imageStructureSize;
    }

    public function __toString(): string
    {
        return $this->getTitre();
    }

    /**
     * @return Collection<int, Entreprise>
     */
    public function getEntreprises(): Collection
    {
        return $this->entreprises;
    }

    public function addEntreprise(Entreprise $entreprise): static
    {
        if (!$this->entreprises->contains($entreprise)) {
            $this->entreprises->add($entreprise);
            $entreprise->addSeminaire($this);
        }

        return $this;
    }

    public function removeEntreprise(Entreprise $entreprise): static
    {
        if ($this->entreprises->removeElement($entreprise)) {
            $entreprise->removeSeminaire($this);
        }

        return $this;
    }

    public function getDescriptionEquipement(): ?string
    {
        return $this->descriptionEquipement;
    }

    public function setDescriptionEquipement(?string $descriptionEquipement): self
    {
        $this->descriptionEquipement = $descriptionEquipement;

        return $this;
    }

    /**
     * If manually uploading a file (i.e. not using Symfony Form) ensure an instance
     * of 'UploadedFile' is injected into this setter to trigger the update. If this
     * bundle's configuration parameter 'inject_on_load' is set to 'true' this setter
     * must be able to accept an instance of 'File' as the bundle will inject one here
     * during Doctrine hydration.
     *
     * @param File|\Symfony\Component\HttpFoundation\File\UploadedFile|null $imageEquipementFile
     */
    public function setImageEquipementFile(?File $imageEquipementFile = null): void
    {
        $this->imageEquipementFile = $imageEquipementFile;

        if (null !== $imageEquipementFile) {
            // It is required that at least one field changes if you are using doctrine
            // otherwise the event listeners won't be called and the file is lost
            $this->equipementUpdatedAt = new \DateTimeImmutable();
        }
    }

    public function getImageEquipementFile(): ?File
    {
        return $this->imageEquipementFile;
    }

    public function setImageEquipement(?string $imageEquipement): void
    {
        $this->imageEquipement = $imageEquipement;
    }

    public function getImageEquipement(): ?string
    {
        return $this->imageEquipement;
    }

    public function setImageEquipementSize(?int $imageEquipementSize): void
    {
        $this->imageEquipementSize = $imageEquipementSize;
    }

    public function getImageEquipementSize(): ?int
    {
        return $this->imageEquipementSize;
    }
}

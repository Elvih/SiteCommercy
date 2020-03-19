<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert; 
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\UploadedFile;

/**
 * @ORM\Entity(repositoryClass="App\Repository\EvenementRepository")
 * @Vich\Uploadable()
 */
class Evenement
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var File|null
     * @Assert\Image(mimeTypes="image/jpeg")
     * @Vich\UploadableField(mapping="event_image", fileNameProperty="fichierImage")
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Nom;

    /**
     * @ORM\Column(type="text")
     */
    private $Description;

    /**
     * @ORM\Column(type="datetime")
     */
    private $Date_debut;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $Date_fin;

    /**
     * @var string|null
     * @ORM\Column(type="string", length=255)
     */
    private $fichierImage;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Type", inversedBy="evenements")
     * @ORM\JoinColumn(nullable=false)
     */
    private $Type;

    /**
     * @ORM\Column(type="datetime")
     * @var \Datetime|null
     */
    private $updated_at;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getDateDebut(): ?\DateTimeInterface
    {
        return $this->Date_debut;
    }

    public function setDateDebut(\DateTimeInterface $Date_debut): self
    {
        $this->Date_debut = $Date_debut;

        return $this;
    }

    public function getDateFin(): ?\DateTimeInterface
    {
        return $this->Date_fin;
    }

    public function setDateFin(?\DateTimeInterface $Date_fin): self
    {
        $this->Date_fin = $Date_fin;

        return $this;
    }

    public function getType(): ?Type
    {
        return $this->Type;
    }

    public function setType(?Type $Type): self
    {
        $this->Type = $Type;

        return $this;
    }

    /**
     * Get the value of imageFile
     *
     * @return  File|null
     */ 
    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    /**
     * Set the value of imageFile
     *
     * @param  File|null  $imageFile
     *
     * @return  Evenement
     */ 
    public function setImageFile(?File $imageFile): Evenement
    {
        $this->imageFile = $imageFile;
        if ($this->imageFile instanceof UploadedFile) {
            $this->updated_at = new \DateTime('now');
        }
        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeInterface
    {
        return $this->updated_at;
    }

    public function setUpdatedAt(\DateTimeInterface $updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of fichierImage
     *
     * @return  string|null
     */ 
    public function getFichierImage()
    {
        return $this->fichierImage;
    }

    /**
     * Set the value of fichierImage
     *
     * @param  string|null  $fichierImage
     *
     * @return  self
     */ 
    public function setFichierImage($fichierImage)
    {
        $this->fichierImage = $fichierImage;

        return $this;
    }
}

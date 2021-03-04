<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=EventRepository::class)
 */
class Event
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     *@Assert\NotBlank(message="id_comp is required")

     */
    private $id_comp;

    /**
     * @ORM\Column(type="integer")
     *@Assert\NotBlank(message="nbr is required")

     */
    private $nbr;

    /**
     * @ORM\Column(type="date")
     *  *@Assert\Date / DateTime(message="data is required")

     */
    private $date;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\NotBlank(message="description is required")

     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdComp(): ?int
    {
        return $this->id_comp;
    }

    public function setIdComp(int $id_comp): self
    {
        $this->id_comp = $id_comp;

        return $this;
    }

    public function getNbr(): ?int
    {
        return $this->nbr;
    }

    public function setNbr(int $nbr): self
    {
        $this->nbr = $nbr;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }
}

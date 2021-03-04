<?php

namespace App\Entity;

use App\Repository\CommentaireRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


/**
 * @ORM\Entity(repositoryClass=CommentaireRepository::class)
 */
class Commentaire
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     *@Assert\NotBlank(message="user is required")

     */
    private $user;

    /**
     * @ORM\Column(type="string", length=255)
      *@Assert\NotBlank(message="nom is required")

     */
    private $nom;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\NotBlank(message="mail is required")

     */
    private $mail;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\NotBlank(message="subject is required")

     */
    private $subject;

    /**
     * @ORM\Column(type="integer")
   *@Assert\NotBlank(message="mobile is required")

     */
    private $mobile;

    /**
     * @ORM\Column(type="string", length=255)
     *@Assert\NotBlank(message="commentaire is required")

     */
    private $commentaire;

    /**
     * @ORM\Column(type="date")
     *@Assert\Date / DateTime(message="nbr is required")

     */
    private $date;

    /**
     * @ORM\Column(type="integer")
     *@Assert\NotBlank(message="rate is required")

     */
    private $rate;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?int
    {
        return $this->user;
    }

    public function setUser(int $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

        return $this;
    }

    public function getMail(): ?string
    {
        return $this->mail;
    }

    public function setMail(string $mail): self
    {
        $this->mail = $mail;

        return $this;
    }

    public function getSubject(): ?string
    {
        return $this->subject;
    }

    public function setSubject(string $subject): self
    {
        $this->subject = $subject;

        return $this;
    }

    public function getMobile(): ?int
    {
        return $this->mobile;
    }

    public function setMobile(int $mobile): self
    {
        $this->mobile = $mobile;

        return $this;
    }

    public function getCommentaire(): ?string
    {
        return $this->commentaire;
    }

    public function setCommentaire(string $commentaire): self
    {
        $this->commentaire = $commentaire;

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

    public function getRate(): ?int
    {
        return $this->rate;
    }

    public function setRate(int $rate): self
    {
        $this->rate = $rate;

        return $this;
    }
}

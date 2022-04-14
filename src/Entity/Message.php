<?php

namespace App\Entity;

use App\Repository\MessageRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=MessageRepository::class)
 */
class Message
{
    /**
     * @Groups({"mess_all"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"mess_all"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"mess_all"})
     * @ORM\Column(type="string", length=255)
     */
    private $surname;

    /**
     * @Groups({"mess_all"})
     * @ORM\Column(type="string", length=255)
     */
    private $email;

    /**
     * @Groups({"mess_all"})
     * @ORM\Column(type="datetimetz")
     */
    private $date;

    /**
     * Message constructor.
     */
    public function __construct()
    {
        $this->date = new \DateTime();
        $this->surname = '';
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSurname(): ?string
    {
        return $this->surname;
    }

    public function setSurname(string $surname): self
    {
        $this->surname = $surname;

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

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }
}

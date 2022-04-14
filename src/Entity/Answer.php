<?php

namespace App\Entity;

use App\Repository\AnswerRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=AnswerRepository::class)
 */
class Answer
{
    /**
     * @Groups({"answer_all","answer_ok","session_all","step_all","quest_all"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
=n  @        */
    private $id;

    /**
     * @Groups({"answer_all","answer_ok","session_all","step_all","quest_all"})
     * @ORM\Column(type="text")
     */
    private $text;

    /**
     * @Groups({"answer_ok"})
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @Groups({"answer_ok"})
     * @ORM\Column(type="boolean")
     */
    private $isTrue;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;


    /**
     * @ORM\ManyToOne(targetEntity=Tool::class, inversedBy="possibleAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $tool;

    /**
     * @Groups({"answer_ok"})
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * Answer constructor.
     */
    public function __construct()
    {
        $this->isActive = true;
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getText(): ?string
    {
        return $this->text;
    }

    public function setText(string $value): self
    {
        $this->text = $value;

        return $this;
    }

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }



    public function getIsTrue(): ?bool
    {
        return $this->isTrue;
    }

    public function setIsTrue(bool $isTrue): self
    {
        $this->isTrue = $isTrue;

        return $this;
    }


    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getTool(): ?Tool
    {
        return $this->tool;
    }

    public function setTool(?Tool $tool): self
    {
        $this->tool = $tool;

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
}

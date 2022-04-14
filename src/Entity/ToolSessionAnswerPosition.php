<?php

namespace App\Entity;

use App\Repository\ToolSessionAnswerPositionRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ToolSessionAnswerPositionRepository::class)
 */
class ToolSessionAnswerPosition
{
    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\ManyToOne(targetEntity=Answer::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $answer;

    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\Column(type="integer")
     */
    private $position;

    /**
     * @ORM\ManyToOne(targetEntity=Tool::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tool;

    /**
     * @ORM\ManyToOne(targetEntity=ToolSessionAnswer::class, inversedBy="multipleAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $toolSessionAnswer;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAnswer(): ?Answer
    {
        return $this->answer;
    }

    public function setAnswer(?Answer $answer): self
    {
        $this->answer = $answer;

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

    public function getTool(): ?Tool
    {
        return $this->tool;
    }

    public function setTool(?Tool $tool): self
    {
        $this->tool = $tool;

        return $this;
    }

    public function getToolSessionAnswer(): ?ToolSessionAnswer
    {
        return $this->toolSessionAnswer;
    }

    public function setToolSessionAnswer(?ToolSessionAnswer $toolSessionAnswer): self
    {
        $this->toolSessionAnswer = $toolSessionAnswer;

        return $this;
    }
}

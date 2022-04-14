<?php

namespace App\Entity;

use App\Repository\ToolSessionAnswerRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ToolSessionAnswerRepository::class)
 */
class ToolSessionAnswer
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
     * @ORM\ManyToOne(targetEntity=Tool::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $tool;

    /**
     * @ORM\ManyToOne(targetEntity=SessionStep::class, inversedBy="toolSessionAnswers",cascade={"persist"})
     * @ORM\JoinColumn(nullable=false)
     */
    private $sessionStep;

    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\ManyToOne(targetEntity=Answer::class,cascade={"persist","remove"})
     */
    private $singleAnswer;


    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\Column(type="boolean")
     */
    private $isDone;

    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @ORM\ManyToOne(targetEntity=Session::class, inversedBy="toolSessionAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $session;

    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\Column(type="boolean",nullable=true)
     */
    private $isTrue;

    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\OneToMany(targetEntity=ToolSessionAnswerPosition::class, mappedBy="toolSessionAnswer", orphanRemoval=true, cascade={"persist","remove"})
     */
    private $multipleAnswers;

    /**
     * @ORM\ManyToOne(targetEntity=SessionStepBackground::class, inversedBy="toolSessionAnswers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sessionStepBackground;

    /**
     * @Groups({"session_all","session_step_all","answer_ok"})
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $nextTime;

    public function __construct()
    {
        $this->isTrue = null;
        $this->isDone = false;
        $this->multipleAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getSessionStep(): ?SessionStep
    {
        return $this->sessionStep;
    }

    public function setSessionStep(?SessionStep $sessionStep): self
    {
        $this->sessionStep = $sessionStep;

        return $this;
    }

    public function getSingleAnswer(): ?Answer
    {
        return $this->singleAnswer;
    }

    public function setSingleAnswer(?Answer $singleAnswer): self
    {
        $this->singleAnswer = $singleAnswer;

        return $this;
    }


    public function getIsDone(): ?bool
    {
        return $this->isDone;
    }

    public function setIsDone(bool $isDone): self
    {
        $this->isDone = $isDone;

        return $this;
    }

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

        return $this;
    }

    public function getSession(): ?Session
    {
        return $this->session;
    }

    public function setSession(?Session $session): self
    {
        $this->session = $session;

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

    /**
     * @return Collection|ToolSessionAnswerPosition[]
     */
    public function getMultipleAnswers(): Collection
    {
        return $this->multipleAnswers;
    }

    public function addMultipleAnswer(ToolSessionAnswerPosition $multipleAnswer): self
    {
        if (!$this->multipleAnswers->contains($multipleAnswer)) {
            $this->multipleAnswers[] = $multipleAnswer;
            $multipleAnswer->setToolSessionAnswer($this);
        }

        return $this;
    }

    public function removeMultipleAnswer(ToolSessionAnswerPosition $multipleAnswer): self
    {
        if ($this->multipleAnswers->removeElement($multipleAnswer)) {
            // set the owning side to null (unless already changed)
            if ($multipleAnswer->getToolSessionAnswer() === $this) {
                $multipleAnswer->setToolSessionAnswer(null);
            }
        }

        return $this;
    }

    public function getSessionStepBackground(): ?SessionStepBackground
    {
        return $this->sessionStepBackground;
    }

    public function setSessionStepBackground(?SessionStepBackground $sessionStepBackground): self
    {
        $this->sessionStepBackground = $sessionStepBackground;

        return $this;
    }

    public function getNextTime(): ?\DateTimeInterface
    {
        return $this->nextTime;
    }

    public function setNextTime(?\DateTimeInterface $nextTime): self
    {
        $this->nextTime = $nextTime;

        return $this;
    }
}

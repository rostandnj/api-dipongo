<?php

namespace App\Entity;

use App\Repository\SessionStepBackgroundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SessionStepBackgroundRepository::class)
 */
class SessionStepBackground
{
    /**
     *  @Groups({"session_all","session_step_all"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\ManyToOne(targetEntity=StepBackground::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $StepBackground;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\OneToMany(targetEntity=ToolSessionAnswer::class, mappedBy="sessionStepBackground", orphanRemoval=true, cascade={"persist","remove"})
     */
    private $toolSessionAnswers;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\Column(type="integer")
     */
    private $nbQuestion;

    /**
     * @ORM\ManyToOne(targetEntity=SessionStep::class, inversedBy="sessionStepBackgrounds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $sessionStep;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\Column(type="integer")
     */
    private $position;

    public function __construct()
    {
        $this->toolSessionAnswers = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getStepBackground(): ?StepBackground
    {
        return $this->StepBackground;
    }

    public function setStepBackground(?StepBackground $StepBackground): self
    {
        $this->StepBackground = $StepBackground;

        return $this;
    }

    /**
     * @return Collection|ToolSessionAnswer[]
     */
    public function getToolSessionAnswers(): Collection
    {
        return $this->toolSessionAnswers;
    }

    public function addToolSessionAnswer(ToolSessionAnswer $toolSessionAnswer): self
    {
        if (!$this->toolSessionAnswers->contains($toolSessionAnswer)) {
            $this->toolSessionAnswers[] = $toolSessionAnswer;
            $toolSessionAnswer->setSessionStepBackground($this);
        }

        return $this;
    }

    public function removeToolSessionAnswer(ToolSessionAnswer $toolSessionAnswer): self
    {
        if ($this->toolSessionAnswers->removeElement($toolSessionAnswer)) {
            // set the owning side to null (unless already changed)
            if ($toolSessionAnswer->getSessionStepBackground() === $this) {
                $toolSessionAnswer->setSessionStepBackground(null);
            }
        }

        return $this;
    }

    public function getNbQuestion(): ?int
    {
        return $this->nbQuestion;
    }

    public function setNbQuestion(int $nbQuestion): self
    {
        $this->nbQuestion = $nbQuestion;

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

    public function getPosition(): ?int
    {
        return $this->position;
    }

    public function setPosition(int $position): self
    {
        $this->position = $position;

        return $this;
    }
}

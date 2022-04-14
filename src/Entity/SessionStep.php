<?php

namespace App\Entity;

use App\Repository\SessionStepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SessionStepRepository::class)
 */
class SessionStep
{
    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Session::class, inversedBy="sessionSteps")
     * @ORM\JoinColumn(nullable=false)
     */
    private $session;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\ManyToOne(targetEntity=Step::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $step;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\Column(type="integer")
     */
    private $questionDone;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\Column(type="integer")
     */
    private $questionTrue;

    /**
     *
     * @ORM\OneToMany(targetEntity=ToolSessionAnswer::class, mappedBy="sessionStep", orphanRemoval=true)
     */
    private $toolSessionAnswers;

    /**
     * @Groups({"session_all","session_step_all"})
     * @ORM\Column(type="integer")
     */
    private $nbQuestion;

    /**
     * @ORM\Column(type="integer")
     */
    private $nbBackground;

    /**
     *  @Groups({"session_all","session_step_all"})
     * @ORM\OneToMany(targetEntity=SessionStepBackground::class, mappedBy="sessionStep", orphanRemoval=true, cascade={"persist","remove"})
     */
    private $sessionStepBackgrounds;

    /**
     * SessionStep constructor.
     */
    public function __construct()
    {
        $this->isActive = true;
        $this->toolSessionAnswers = new ArrayCollection();
        $this->questionDone = 0;
        $this->questionTrue = 0;
        $this->sessionStepBackgrounds = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
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

    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    public function getStep(): ?Step
    {
        return $this->step;
    }

    public function setStep(?Step $step): self
    {
        $this->step = $step;

        return $this;
    }

    public function getQuestionDone(): ?int
    {
        return $this->questionDone;
    }

    public function setQuestionDone(int $questionDone): self
    {
        $this->questionDone = $questionDone;

        return $this;
    }



    public function getQuestionTrue(): ?int
    {
        return $this->questionTrue;
    }

    public function setQuestionTrue(int $questionTrue): self
    {
        $this->questionTrue = $questionTrue;

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
            $toolSessionAnswer->setSessionStep($this);
        }

        return $this;
    }

    public function removeToolSessionAnswer(ToolSessionAnswer $toolSessionAnswer): self
    {
        if ($this->toolSessionAnswers->removeElement($toolSessionAnswer)) {
            // set the owning side to null (unless already changed)
            if ($toolSessionAnswer->getSessionStep() === $this) {
                $toolSessionAnswer->setSessionStep(null);
            }
        }

        return $this;
    }

    public function incQuestionTrue(): self{
        $this->questionTrue = $this->questionTrue + 1;
        return $this;
    }

    public function incQuestionDone(): self{
        $this->questionDone = $this->questionDone + 1;
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

    public function getNbBackground(): ?int
    {
        return $this->nbBackground;
    }

    public function setNbBackground(int $nbBackground): self
    {
        $this->nbBackground = $nbBackground;

        return $this;
    }

    /**
     * @return Collection|SessionStepBackground[]
     */
    public function getSessionStepBackgrounds(): Collection
    {
        return $this->sessionStepBackgrounds;
    }

    public function addSessionStepBackground(SessionStepBackground $sessionStepBackground): self
    {
        if (!$this->sessionStepBackgrounds->contains($sessionStepBackground)) {
            $this->sessionStepBackgrounds[] = $sessionStepBackground;
            $sessionStepBackground->setSessionStep($this);
        }

        return $this;
    }

    public function removeSessionStepBackground(SessionStepBackground $sessionStepBackground): self
    {
        if ($this->sessionStepBackgrounds->removeElement($sessionStepBackground)) {
            // set the owning side to null (unless already changed)
            if ($sessionStepBackground->getSessionStep() === $this) {
                $sessionStepBackground->setSessionStep(null);
            }
        }

        return $this;
    }
}

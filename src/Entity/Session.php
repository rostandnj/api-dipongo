<?php

namespace App\Entity;

use App\Repository\SessionRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=SessionRepository::class)
 */
class Session
{
    /**
     * @Groups({"session_all"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=User::class)
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @Groups({"session_all"})
     * @ORM\Column(type="datetimetz")
     */
    private $startDate;

    /**
     * @Groups({"session_all"})
     * total time elapsed in minutes
     * @ORM\Column(type="integer", nullable=false,name="total_time")
     */
    private $currentTime;

    /**
     * @Groups({"session_all"})
     * date when user back or leave to the game
     * @ORM\Column(type="datetimetz", nullable=false)
     */
    private $lastDate;

    /**
     * @Groups({"session_all"})
     * if session is running
     * @ORM\Column(type="boolean")
     */
    private $status;

    /**
     * @Groups({"session_all"})
     * @ORM\OneToMany(targetEntity=SessionStep::class, mappedBy="session",cascade={"persist","remove"})
     */
    private $sessionSteps;

    /**
     * @ORM\OneToMany(targetEntity=ToolSessionAnswer::class, mappedBy="session", orphanRemoval=true)
     */
    private $toolSessionAnswers;

    /**
     * @Groups({"session_all"})
     * @ORM\Column(type="datetimetz")
     */
    private $backDate;

    /**
     *
     * @Groups({"session_all"})
     * @ORM\Column(type="datetimetz")
     */
    private $shouldEndDate;

    /**
     * @Groups({"session_all"})
     * @ORM\Column(type="integer")
     */
    private $questionDone;

    /**
     * @Groups({"session_all"})
     * @ORM\Column(type="integer")
     */
    private $questionTotal;

    /**
     * @Groups({"session_all"})
     * @ORM\Column(type="text")
     */
    private $message;

    const TIME = 50*60;//secondes
    const QUESTION = 50;

    /**
     * Session constructor.
     */
    public function __construct()
    {
        $this->startDate = new \DateTime();
        $this->lastDate = new \DateTime();
        $this->backDate = new \DateTime();
        $this->shouldEndDate  = new \DateTime();
        $this->shouldEndDate->add(new \DateInterval('PT'.self::TIME.'S'));
        $this->status = true;
        $this->sessionSteps = new ArrayCollection();
        $this->toolSessionAnswers = new ArrayCollection();
        $this->currentTime = 0;
        $this->questionDone = 0;
        $this->questionTotal = 0;
        $this->message = "";
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getStartDate(): ?\DateTimeInterface
    {
        return $this->startDate;
    }

    public function setStartDate(\DateTimeInterface $startDate): self
    {
        $this->startDate = $startDate;

        return $this;
    }

    public function getCurrentTime(): ?int
    {
        return $this->currentTime;
    }

    public function setCurrentTime(int $currentTime): self
    {
        $this->currentTime = $currentTime;

        return $this;
    }



    public function getLastDate(): ?\DateTimeInterface
    {
        return $this->lastDate;
    }

    public function setLastDate(?\DateTimeInterface $backDate): self
    {
        $this->lastDate = $backDate;

        return $this;
    }

    public function getStatus(): ?bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return Collection|SessionStep[]
     */
    public function getSessionSteps(): Collection
    {
        return $this->sessionSteps;
    }

    public function addSessionStep(SessionStep $sessionStep): self
    {
        if (!$this->sessionSteps->contains($sessionStep)) {
            $this->sessionSteps[] = $sessionStep;
            $sessionStep->setSession($this);
        }

        return $this;
    }

    public function removeSessionStep(SessionStep $sessionStep): self
    {
        if ($this->sessionSteps->removeElement($sessionStep)) {
            // set the owning side to null (unless already changed)
            if ($sessionStep->getSession() === $this) {
                $sessionStep->setSession(null);
            }
        }

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
            $toolSessionAnswer->setSession($this);
        }

        return $this;
    }

    public function removeToolSessionAnswer(ToolSessionAnswer $toolSessionAnswer): self
    {
        if ($this->toolSessionAnswers->removeElement($toolSessionAnswer)) {
            // set the owning side to null (unless already changed)
            if ($toolSessionAnswer->getSession() === $this) {
                $toolSessionAnswer->setSession(null);
            }
        }

        return $this;
    }

    public function getBackDate(): ?\DateTimeInterface
    {
        return $this->backDate;
    }

    public function setBackDate(\DateTimeInterface $backDate): self
    {
        $this->backDate = $backDate;

        return $this;
    }

    public function getShouldEndDate(): ?\DateTimeInterface
    {
        return $this->shouldEndDate;
    }

    public function setShouldEndDate(\DateTimeInterface $shouldEndDate): self
    {
        $this->shouldEndDate = $shouldEndDate;

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

    public function getQuestionTotal(): ?int
    {
        return $this->questionTotal;
    }

    public function setQuestionTotal(int $questionTotal): self
    {
        $this->questionTotal = $questionTotal;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): self
    {
        $this->message = $message;

        return $this;
    }

    public function incQuestionDone(): self{
        $this->questionDone = $this->questionDone + 1;
        return $this;
    }

}

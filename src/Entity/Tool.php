<?php

namespace App\Entity;

use App\Repository\ToolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OrderBy;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=ToolRepository::class)
 */
class Tool
{
    /**
     * @Groups({"session_all","step_all","quest_all","answer_ok"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"session_all","step_all","quest_all","answer_ok"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @Groups({"session_all","step_all","quest_all","answer_ok"})
     *  true / false or multiple answer or movable tool
     * @ORM\Column(type="integer")
     */
    private $type;

    /**
     * @Groups({"session_all","step_all","quest_all","answer_ok"})
     * @ORM\Column(type="text")
     */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity=Step::class, inversedBy="tools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $step;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @Groups({"session_all","step_all","quest_all","answer_ok"})
     * @OrderBy({"text" = "DESC"})
     * @ORM\OneToMany(targetEntity=Answer::class, mappedBy="tool", orphanRemoval=true, cascade={"persist","remove"})
     */
    private $possibleAnswers;

    /**
     * @ORM\ManyToOne(targetEntity=StepBackground::class, inversedBy="tools")
     * @ORM\JoinColumn(nullable=false)
     */
    private $stepBackground;


    /**
     * @Groups({"session_all","step_all","quest_all","answer_ok"})
     * @ORM\Column(type="integer")
     */
    private $questionNumber;

    /**
     * @Groups({"session_all","step_all","quest_all","answer_ok"})
     * @ORM\Column(type="string", length=255)
     */
    private $questionImage;

    const QUESTION_TRUE_OR_FALSE = 1;
    const QUESTION_MULTIPLE_ANSWER= 2;
    const QUESTION_MOVABLE_OBJECT= 3;

    public function __construct()
    {
        $this->possibleAnswers = new ArrayCollection();
        $this->questionImage = "";
        $this->isActive = true;
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

    public function getType(): ?int
    {
        return $this->type;
    }

    public function setType(int $type): self
    {
        $this->type = $type;

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




    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * @return Collection|Answer[]
     */
    public function getPossibleAnswers(): Collection
    {
        return $this->possibleAnswers;
    }

    public function addPossibleAnswer(Answer $possibleAnswer): self
    {
        if (!$this->possibleAnswers->contains($possibleAnswer)) {
            $this->possibleAnswers[] = $possibleAnswer;
            $possibleAnswer->setTool($this);
        }

        return $this;
    }

    public function removePossibleAnswer(Answer $possibleAnswer): self
    {
        if ($this->possibleAnswers->removeElement($possibleAnswer)) {
            // set the owning side to null (unless already changed)
            if ($possibleAnswer->getTool() === $this) {
                $possibleAnswer->setTool(null);
            }
        }

        return $this;
    }

    public function getStepBackground(): ?StepBackground
    {
        return $this->stepBackground;
    }

    public function setStepBackground(?StepBackground $stepBackground): self
    {
        $this->stepBackground = $stepBackground;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     * @return Tool
     */
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

    public function getQuestionNumber(): ?int
    {
        return $this->questionNumber;
    }

    public function setQuestionNumber(int $questionNumber): self
    {
        $this->questionNumber = $questionNumber;

        return $this;
    }

    public function getQuestionImage(): ?string
    {
        return $this->questionImage;
    }

    public function setQuestionImage(string $questionImage): self
    {
        $this->questionImage = $questionImage;

        return $this;
    }


}

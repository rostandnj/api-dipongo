<?php

namespace App\Entity;

use App\Repository\StepRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StepRepository::class)
 */
class Step
{
    /**
     * @Groups({"session_all","step_all","quest_all"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"session_all","step_all","quest_all"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @Groups({"session_all","step_all","quest_all"})
     * here define it a step content only MCQ or movable object on the map
     * @ORM\Column(type="integer")
     */
    private $type;


    /**
     *
     * @ORM\OneToMany(targetEntity=StepBackground::class, mappedBy="step",cascade={"persist","remove"})
     */
    private $stepBackgrounds;

    /**
     * @ORM\OneToMany(targetEntity=Tool::class, mappedBy="step", orphanRemoval=true)
     */
    private $tools;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $nbQuestion;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $nbBackground;

    /**
     * Step constructor.
     */
    public function __construct()
    {
        $this->isActive = true;
        $this->stepBackgrounds = new ArrayCollection();
        $this->tools = new ArrayCollection();
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


    public function getIsActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): self
    {
        $this->isActive = $isActive;

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


    /**
     * @return Collection|StepBackground[]
     */
    public function getStepBackgrounds(): Collection
    {
        return $this->stepBackgrounds;
    }

    public function addStepBackground(StepBackground $stepBackground): self
    {
        if (!$this->stepBackgrounds->contains($stepBackground)) {
            $this->stepBackgrounds[] = $stepBackground;
            $stepBackground->setStep($this);
        }

        return $this;
    }

    public function removeStepBackground(StepBackground $stepBackground): self
    {
        if ($this->stepBackgrounds->removeElement($stepBackground)) {
            // set the owning side to null (unless already changed)
            if ($stepBackground->getStep() === $this) {
                $stepBackground->setStep(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Tool[]
     */
    public function getTools(): Collection
    {
        return $this->tools;
    }

    public function addTool(Tool $tool): self
    {
        if (!$this->tools->contains($tool)) {
            $this->tools[] = $tool;
            $tool->setStep($this);
        }

        return $this;
    }

    public function removeTool(Tool $tool): self
    {
        if ($this->tools->removeElement($tool)) {
            // set the owning side to null (unless already changed)
            if ($tool->getStep() === $this) {
                $tool->setStep(null);
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

    public function getNbBackground(): ?int
    {
        return $this->nbBackground;
    }

    public function setNbBackground(int $nbBackground): self
    {
        $this->nbBackground = $nbBackground;

        return $this;
    }
}

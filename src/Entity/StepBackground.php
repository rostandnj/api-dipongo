<?php

namespace App\Entity;

use App\Repository\StepBackgroundRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * @ORM\Entity(repositoryClass=StepBackgroundRepository::class)
 */
class StepBackground
{
    /**
     *  @Groups({"session_all","step_all","quest_all"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     *  @Groups({"session_all","step_all","quest_all"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $nbQuestion;

    /**
     * @ORM\ManyToOne(targetEntity=Step::class, inversedBy="stepBackgrounds")
     * @ORM\JoinColumn(nullable=false)
     */
    private $step;

    /**
     *
     * @ORM\OneToMany(targetEntity=Tool::class, mappedBy="stepBackground", orphanRemoval=true, cascade={"persist","remove"})
     */
    private $tools;

    /**
     *
     * @ORM\Column(type="integer")
     */
    private $position;

    public function __construct()
    {
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

    public function getNbQuestion(): ?int
    {
        return $this->nbQuestion;
    }

    public function setNbQuestion(int $nbQuestion): self
    {
        $this->nbQuestion = $nbQuestion;

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
            $tool->setStepBackground($this);
        }

        return $this;
    }

    public function removeTool(Tool $tool): self
    {
        if ($this->tools->removeElement($tool)) {
            // set the owning side to null (unless already changed)
            if ($tool->getStepBackground() === $this) {
                $tool->setStepBackground(null);
            }
        }

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

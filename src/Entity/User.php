<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Serializer\Annotation\Ignore;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 */
class User implements UserInterface
{
    /**
     * @Groups({"user_all", "user_mini"})
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @Groups({"user_all", "user_mini"})
     * @ORM\Column(type="string", length=255)
     */
    private $name;


    /**
     * @Groups({"user_all", "user_mini"})
     * @ORM\Column(type="string", length=35)
     */
    private $email;


    /**
     * @ORM\Column(type="string", length=255)
     */
    private $password;

    /**
     * @Groups({"user_all", "user_mini"})
     * @ORM\Column(type="integer", nullable=false)
     */
    private $type;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $rpassword;

    /**
     * @Groups({"user_all","user_mini"})
     * @ORM\Column(type="boolean")
     */
    private $isActive;

    /**
     * @Groups({"user_all","user_mini"})
     * @ORM\Column(type="boolean")
     */
    private $isClose;

    /**
     * @ORM\Column(type="datetimetz")
     */
    private $date;

    /**
     * @ORM\Column(name="token", type="string", length=255, nullable=false)
     */
    private $token;


    /**
     * @ORM\Column(type="datetimetz", nullable=true)
     */
    private $activationDate;

    /**
     * @Groups({"user_all","user_mini"})
     * @ORM\Column(type="boolean")
     */
    private $hasRunningSession;

    /**
     * @ORM\ManyToOne(targetEntity=Session::class,cascade={"persist","remove"})
     */
    private $runningSession;


    CONST USER_ADMIN=0;
    CONST USER_PLAYER=1;

    public function __construct()
    {
        $this->date = new \DateTime();
        $this->isActive = false;
        $this->isClose = false;
        $this->roles = [];
        $this->token = uniqid('',true);
        $this->hasRunningSession = false;
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



    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getRpassword(): ?string
    {
        return $this->rpassword;
    }

    public function setRpassword(string $rpassword): self
    {
        $this->rpassword = $rpassword;

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

    public function getIsClose(): ?bool
    {
        return $this->isClose;
    }

    public function setIsClose(bool $isClose): self
    {
        $this->isClose = $isClose;

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

    /**
     * @return mixed
     */
    public function getToken() {
        return $this->token;
    }

    /**
     * @param mixed $token
     *
     * @return User
     */
    public function setToken( $token ) {
        $this->token = $token;

        return $this;
    }


    /**
     * Get roles
     *
     * @return array
     */
    public function getRoles()
    {
        return [$this->type];
    }

    /**
     * @inheritDoc
     */
    public function getSalt()
    {
        return "";
    }

    /**
     * @inheritDoc
     */
    public function getUsername()
    {
        return $this->email;
    }

    /**
     * @inheritDoc
     */
    public function eraseCredentials()
    {
        return "";
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     * @return User
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }




    public function getActivationDate(): ?\DateTimeInterface
    {
        return $this->activationDate;
    }

    public function setActivationDate(?\DateTimeInterface $activationDate): self
    {
        $this->activationDate = $activationDate;

        return $this;
    }



    public function toArray(){
        return [
            'id'=>$this->id,
            'name'=>$this->name,
            'email'=>$this->email,


        ];
    }

    public function getHasRunningSession(): ?bool
    {
        return $this->hasRunningSession;
    }

    public function setHasRunningSession(bool $hasRunningSession): self
    {
        $this->hasRunningSession = $hasRunningSession;

        return $this;
    }

    public function getRunningSession(): ?Session
    {
        return $this->runningSession;
    }

    public function setRunningSession(?Session $runningSession): self
    {
        $this->runningSession = $runningSession;

        return $this;
    }

}

<?php

namespace Proxies\__CG__\App\Entity;

/**
 * DO NOT EDIT THIS FILE - IT WAS CREATED BY DOCTRINE'S PROXY GENERATOR
 */
class Session extends \App\Entity\Session implements \Doctrine\ORM\Proxy\Proxy
{
    /**
     * @var \Closure the callback responsible for loading properties in the proxy object. This callback is called with
     *      three parameters, being respectively the proxy object to be initialized, the method that triggered the
     *      initialization process and an array of ordered parameters that were passed to that method.
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setInitializer
     */
    public $__initializer__;

    /**
     * @var \Closure the callback responsible of loading properties that need to be copied in the cloned object
     *
     * @see \Doctrine\Common\Proxy\Proxy::__setCloner
     */
    public $__cloner__;

    /**
     * @var boolean flag indicating if this object was already initialized
     *
     * @see \Doctrine\Persistence\Proxy::__isInitialized
     */
    public $__isInitialized__ = false;

    /**
     * @var array<string, null> properties to be lazy loaded, indexed by property name
     */
    public static $lazyPropertiesNames = array (
);

    /**
     * @var array<string, mixed> default values of properties to be lazy loaded, with keys being the property names
     *
     * @see \Doctrine\Common\Proxy\Proxy::__getLazyProperties
     */
    public static $lazyPropertiesDefaults = array (
);



    public function __construct(?\Closure $initializer = null, ?\Closure $cloner = null)
    {

        $this->__initializer__ = $initializer;
        $this->__cloner__      = $cloner;
    }







    /**
     * 
     * @return array
     */
    public function __sleep()
    {
        if ($this->__isInitialized__) {
            return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'user', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'startDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'currentTime', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'lastDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'status', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'sessionSteps', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'toolSessionAnswers', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'backDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'shouldEndDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'questionDone', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'questionTotal', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'message'];
        }

        return ['__isInitialized__', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'id', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'user', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'startDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'currentTime', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'lastDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'status', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'sessionSteps', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'toolSessionAnswers', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'backDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'shouldEndDate', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'questionDone', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'questionTotal', '' . "\0" . 'App\\Entity\\Session' . "\0" . 'message'];
    }

    /**
     * 
     */
    public function __wakeup()
    {
        if ( ! $this->__isInitialized__) {
            $this->__initializer__ = function (Session $proxy) {
                $proxy->__setInitializer(null);
                $proxy->__setCloner(null);

                $existingProperties = get_object_vars($proxy);

                foreach ($proxy::$lazyPropertiesDefaults as $property => $defaultValue) {
                    if ( ! array_key_exists($property, $existingProperties)) {
                        $proxy->$property = $defaultValue;
                    }
                }
            };

        }
    }

    /**
     * 
     */
    public function __clone()
    {
        $this->__cloner__ && $this->__cloner__->__invoke($this, '__clone', []);
    }

    /**
     * Forces initialization of the proxy
     */
    public function __load()
    {
        $this->__initializer__ && $this->__initializer__->__invoke($this, '__load', []);
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitialized($initialized)
    {
        $this->__isInitialized__ = $initialized;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setInitializer(\Closure $initializer = null)
    {
        $this->__initializer__ = $initializer;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __getInitializer()
    {
        return $this->__initializer__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     */
    public function __setCloner(\Closure $cloner = null)
    {
        $this->__cloner__ = $cloner;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific cloning logic
     */
    public function __getCloner()
    {
        return $this->__cloner__;
    }

    /**
     * {@inheritDoc}
     * @internal generated method: use only when explicitly handling proxy specific loading logic
     * @deprecated no longer in use - generated code now relies on internal components rather than generated public API
     * @static
     */
    public function __getLazyProperties()
    {
        return self::$lazyPropertiesDefaults;
    }

    
    /**
     * {@inheritDoc}
     */
    public function getId(): ?int
    {
        if ($this->__isInitialized__ === false) {
            return (int)  parent::getId();
        }


        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getId', []);

        return parent::getId();
    }

    /**
     * {@inheritDoc}
     */
    public function getUser(): ?\App\Entity\User
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getUser', []);

        return parent::getUser();
    }

    /**
     * {@inheritDoc}
     */
    public function setUser(?\App\Entity\User $user): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setUser', [$user]);

        return parent::setUser($user);
    }

    /**
     * {@inheritDoc}
     */
    public function getStartDate(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStartDate', []);

        return parent::getStartDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setStartDate(\DateTimeInterface $startDate): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStartDate', [$startDate]);

        return parent::setStartDate($startDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getCurrentTime(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getCurrentTime', []);

        return parent::getCurrentTime();
    }

    /**
     * {@inheritDoc}
     */
    public function setCurrentTime(int $currentTime): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setCurrentTime', [$currentTime]);

        return parent::setCurrentTime($currentTime);
    }

    /**
     * {@inheritDoc}
     */
    public function getLastDate(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getLastDate', []);

        return parent::getLastDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setLastDate(?\DateTimeInterface $backDate): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setLastDate', [$backDate]);

        return parent::setLastDate($backDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getStatus(): ?bool
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getStatus', []);

        return parent::getStatus();
    }

    /**
     * {@inheritDoc}
     */
    public function setStatus(bool $status): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setStatus', [$status]);

        return parent::setStatus($status);
    }

    /**
     * {@inheritDoc}
     */
    public function getSessionSteps(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getSessionSteps', []);

        return parent::getSessionSteps();
    }

    /**
     * {@inheritDoc}
     */
    public function addSessionStep(\App\Entity\SessionStep $sessionStep): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addSessionStep', [$sessionStep]);

        return parent::addSessionStep($sessionStep);
    }

    /**
     * {@inheritDoc}
     */
    public function removeSessionStep(\App\Entity\SessionStep $sessionStep): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeSessionStep', [$sessionStep]);

        return parent::removeSessionStep($sessionStep);
    }

    /**
     * {@inheritDoc}
     */
    public function getToolSessionAnswers(): \Doctrine\Common\Collections\Collection
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getToolSessionAnswers', []);

        return parent::getToolSessionAnswers();
    }

    /**
     * {@inheritDoc}
     */
    public function addToolSessionAnswer(\App\Entity\ToolSessionAnswer $toolSessionAnswer): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'addToolSessionAnswer', [$toolSessionAnswer]);

        return parent::addToolSessionAnswer($toolSessionAnswer);
    }

    /**
     * {@inheritDoc}
     */
    public function removeToolSessionAnswer(\App\Entity\ToolSessionAnswer $toolSessionAnswer): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'removeToolSessionAnswer', [$toolSessionAnswer]);

        return parent::removeToolSessionAnswer($toolSessionAnswer);
    }

    /**
     * {@inheritDoc}
     */
    public function getBackDate(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getBackDate', []);

        return parent::getBackDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setBackDate(\DateTimeInterface $backDate): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setBackDate', [$backDate]);

        return parent::setBackDate($backDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getShouldEndDate(): ?\DateTimeInterface
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getShouldEndDate', []);

        return parent::getShouldEndDate();
    }

    /**
     * {@inheritDoc}
     */
    public function setShouldEndDate(\DateTimeInterface $shouldEndDate): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setShouldEndDate', [$shouldEndDate]);

        return parent::setShouldEndDate($shouldEndDate);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestionDone(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuestionDone', []);

        return parent::getQuestionDone();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestionDone(int $questionDone): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuestionDone', [$questionDone]);

        return parent::setQuestionDone($questionDone);
    }

    /**
     * {@inheritDoc}
     */
    public function getQuestionTotal(): ?int
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getQuestionTotal', []);

        return parent::getQuestionTotal();
    }

    /**
     * {@inheritDoc}
     */
    public function setQuestionTotal(int $questionTotal): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setQuestionTotal', [$questionTotal]);

        return parent::setQuestionTotal($questionTotal);
    }

    /**
     * {@inheritDoc}
     */
    public function getMessage(): ?string
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'getMessage', []);

        return parent::getMessage();
    }

    /**
     * {@inheritDoc}
     */
    public function setMessage(string $message): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'setMessage', [$message]);

        return parent::setMessage($message);
    }

    /**
     * {@inheritDoc}
     */
    public function incQuestionDone(): \App\Entity\Session
    {

        $this->__initializer__ && $this->__initializer__->__invoke($this, 'incQuestionDone', []);

        return parent::incQuestionDone();
    }

}
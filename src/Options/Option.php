<?php

declare(strict_types=1);

namespace gugglegum\CommandLine\Options;

abstract class Option
{
    /**
     * @var string
     */
    private $longName;

    /**
     * @var string
     */
    private $shortName;

    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    protected $valueName = 'value';

    /**
     * @var mixed
     */
    protected $value;

    public function __construct(string $longName = null, string $shortName = null, string $description = null)
    {
        $this->longName = $longName;
        $this->shortName = $shortName;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getLongName(): string
    {
        return $this->longName;
    }

    /**
     * @param string $longName
     * @return self
     */
    public function setLongName(string $longName): self
    {
        $this->longName = $longName;
        return $this;
    }

    public function hasLongName(): bool
    {
        return $this->longName !== null;
    }

    /**
     * @return string
     */
    public function getShortName(): string
    {
        return $this->shortName;
    }

    /**
     * @param string $shortName
     * @return self
     */
    public function setShortName(string $shortName): self
    {
        $this->shortName = $shortName;
        return $this;
    }

    public function hasShortName(): bool
    {
        return $this->shortName !== null;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     * @return self
     */
    public function setDescription(string $description): self
    {
        $this->description = $description;
        return $this;
    }

    public function hasDescription(): bool
    {
        return $this->description !== null;
    }

    /**
     * @return string
     */
    public function getValueName(): string
    {
        return $this->valueName;
    }

    /**
     * @return bool
     */
    public function isDefined(): bool
    {
        return $this->value !== null;
    }

    abstract public function setValue($value);

    abstract public function getValue();
}

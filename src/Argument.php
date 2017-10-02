<?php

declare(strict_types=1);

namespace gugglegum\CommandLine;

class Argument
{
    private $name;

    private $description;

    private $value;

    private $isOptional = false;

    public function __construct(string $name, string $description = null)
    {
        $this->name = $name;
        $this->description = $description;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     * @return self
     */
    public function setDescription($description): self
    {
        $this->description = $description;
        return $this;
    }

    public function hasDescription(): bool
    {
        return $this->description !== null;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }

    /**
     * @return bool
     */
    public function isOptional(): bool
    {
        return $this->isOptional;
    }

    /**
     * @param bool $isOptional
     * @return self
     */
    public function setOptional(bool $isOptional): self
    {
        $this->isOptional = $isOptional;
        return $this;
    }

}

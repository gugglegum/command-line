<?php

declare(strict_types=1);

namespace gugglegum\CommandLine;

use gugglegum\CommandLine\Options\Option;

class Config
{
    /**
     * @var Argument[]
     */
    private $arguments = [];

    /**
     * @var Argument[]
     */
    private $argumentsByName = [];

    /**
     * @var Option[]
     */
    private $options = [];

    /**
     * @var Option[]
     */
    private $optionsByName = [];

    /**
     * @param Argument $argument
     * @return Config
     * @throws Exception
     */
    public function addArgument(Argument $argument): self
    {
        if (!$argument->isOptional() && count($this->arguments) > 0 && $this->arguments[count($this->arguments) - 1]->isOptional()) {
            throw new Exception('Attempt to add non-optional argument after optional');
        }

        $this->arguments[] = $argument;
        $this->argumentsByName[$argument->getName()] = $argument;
        return $this;
    }

    public function getArgument(string $name): Argument
    {
        return $this->argumentsByName[$name];
    }

    public function getArgumentByIndex(int $index): Argument
    {
        return $this->arguments[$index];
    }

    /**
     * @return Argument[]
     */
    public function getArgumentsByName(): array
    {
        return $this->arguments;
    }

    /**
     * @return Argument[]
     */
    public function getArguments(): array
    {
        return $this->arguments;
    }

    public function hasArguments(): bool
    {
        return count($this->arguments) > 0;
    }

    public function addOption(Option $option): self
    {
        if ($option->hasLongName()) {
            $this->optionsByName[$option->getLongName()] = $option;
        }
        if ($option->hasShortName()) {
            $this->optionsByName[$option->getShortName()] = $option;
        }
        $this->options[] = $option;
        return $this;
    }

    public function getOption(string $name): Option
    {
        return $this->optionsByName[$name];
    }

    /**
     * @return Option[]
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    public function hasOptions(): bool
    {
        return count($this->options) > 0;
    }
}

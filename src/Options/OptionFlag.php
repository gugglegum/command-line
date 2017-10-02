<?php

declare(strict_types=1);

namespace gugglegum\CommandLine\Options;

class OptionFlag extends Option
{
    public function __construct(string $longName = null, string $shortName = null, string $description = null)
    {
        parent::__construct($longName, $shortName, $description);
    }

    public function setValue($value)
    {
        $this->value = true;
    }

    public function getValue()
    {
        return (bool) $this->value;
    }
}

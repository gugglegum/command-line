<?php

declare(strict_types=1);

namespace gugglegum\CommandLine\Options;

class OptionInteger extends Option
{
    public function __construct(string $longName = null, string $shortName = null, string $description = null)
    {
        parent::__construct($longName, $shortName, $description);
        $this->valueName = 'number';
    }

    public function setValue($value)
    {
        $this->value = (int) $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

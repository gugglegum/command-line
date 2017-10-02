<?php

declare(strict_types=1);

namespace gugglegum\CommandLine\Options;

class OptionString extends Option
{
    public function setValue($value)
    {
        $this->value = $value;
    }

    public function getValue()
    {
        return $this->value;
    }
}

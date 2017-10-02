<?php

declare(strict_types=1);

namespace gugglegum\CommandLine\Options;

use gugglegum\CommandLine\Exception;

class OptionBoolean extends Option
{
    public function __construct(string $longName = null, string $shortName = null, string $description = null)
    {
        parent::__construct($longName, $shortName, $description);
        $this->valueName = 'bool';
    }

    public function setValue($value)
    {
        static $falseValues = ['0', '-', 'false'];
        static $trueValues = ['1', '+', 'true'];

        if (is_bool($value)) {
            $this->value = $value;
        } else {
            if (in_array($value, $falseValues)) {
                $this->value = false;
            } elseif (in_array($value, $trueValues)) {
                $this->value = true;
            } else {
                throw new Exception("Invalid value \"{$value}\" for boolean option (expected: \"" . implode('", "', array_merge($falseValues, $trueValues)) . '")');
            }
        }
    }

    public function getValue()
    {
        return (bool) $this->value;
    }
}

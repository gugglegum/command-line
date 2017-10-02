<?php

declare(strict_types=1);

namespace gugglegum\CommandLine;

use gugglegum\CommandLine\Options\OptionFlag;

class Parser
{
    public static function parse(array $argv, Config $config)
    {
        $argumentIndex = 0;
        for ($i = 1; $i < count($argv); $i++) {
            if (strlen($argv[$i]) > 0 && $argv[$i]{0} === '-') { // if $argv[$i] is some option (maybe short, maybe long)
                if (strlen($argv[$i]) > 1 && $argv[$i]{1} === '-') { // long option
                    if (($equalCharOffset = strpos($argv[$i], '=', 2)) !== false) {
                        $longName = substr($argv[$i], 2, $equalCharOffset - 2);
                        $value = substr($argv[$i], $equalCharOffset + 1);
                    } else {
                        $longName = substr($argv[$i], 2);
                        $value = true;
                    }
                    $config->getOption($longName)->setValue($value);
                } else { // short option
                    $shortName = substr($argv[$i], 1, 1);
                    $option = $config->getOption($shortName);
                    $value = substr($argv[$i], 2);
                    if ($value === '' && !$option instanceof OptionFlag) {
                        if ($i + 1 < count($argv)) {
                            $value = $argv[++$i];
                        } else {
                            throw new Exception("Expected an argument for option -{$shortName}");
                        }
                    }
                    $option->setValue($value);
                }
            } else { // if $argv[$i] is argument (not an option)
                $config->getArgumentByIndex($argumentIndex++)->setValue($argv[$i]);
            }
        }
    }
}

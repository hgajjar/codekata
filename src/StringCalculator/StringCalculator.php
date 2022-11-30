<?php

namespace StringCalculator;

use InvalidArgumentException;

class StringCalculator
{
    public function calculate(string $argument): int
    {
        $matches =   $this->parseString($argument);

        if (!$this->validateString($matches)) {
            throw new InvalidArgumentException;
        }

        switch($matches[1]) {
            case "+":
                $result = $matches[0] + $matches[2];
                break;
                // etc
        }

        return $result;
    }

    private function parseString(string $argument): array
    {
        $pattern = "/(\d+)(\+)(\d+)/";
        preg_match($pattern, $argument, $matches);

        array_shift($matches);

        return $matches;
    }

    private function validateString(array $matches): bool
    {
        return count($matches) >= 3;
    }
}

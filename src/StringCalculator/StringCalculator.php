<?php

namespace StringCalculator;

class StringCalculator
{
    public function calculate(string $argument): int
    {
        $matches = explode(' ', $argument);
        var_dump($matches);
        if (!$this->validateString($matches)) {
            throw new \InvalidArgumentException();
        }
        while (count($matches) > 2) {
            switch ($matches[1]) {
                case '+':
                    $result = $matches[0] + $matches[2];

                    break;

                case '-':
                    $result = $matches[0] - $matches[2];

                    break;
            }

            unset($matches[0],$matches[1],$matches[2]);
            array_unshift($matches, $result);
        }

        return $matches[0];
    }

    private function parseString(string $argument): array
    {
        $pattern = '/(\\d+)(\\+)(\\d+)/';
        preg_match($pattern, $argument, $matches);

        array_shift($matches);

        return $matches;
    }

    private function validateString(array $matches): bool
    {
        return count($matches) >= 3;
    }
}

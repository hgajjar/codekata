<?php

namespace StringCalculator;

class StringCalculator
{
    public function calculate(string $argument): int
    {
        $matches = explode(' ', $argument);
        if (!$this->validateString($matches)) {
            throw new \InvalidArgumentException();
        }
        while (count($matches) > 2) {
            $matches = $this->calculateOperator('/', $matches);
            $matches = $this->calculateOperator('*', $matches);
            $matches = $this->calculateOperator('+', $matches);
            $matches = $this->calculateOperator('-', $matches);
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

    private function calculateOperator(string $operator, array $matches): array
    {
        while (in_array($operator, $matches)) {
            $index = array_search($operator, $matches);

            $result = eval('return '.$matches[$index - 1].$operator.$matches[$index + 1].';');
            unset($matches[$index - 1],$matches[$index + 1]);
            $matches[$index] = $result;

            $matches = array_values($matches);
        }

        return $matches;
    }
}

<?php

namespace StringAdder;

use InvalidArgumentException;

class StringAdder
{
    public function add(string $input1, string $input2): int
    {
        if (!$this->validateString($input1) || !$this->validateString($input2)) {
            throw new InvalidArgumentException();
        }

        return (int)$input1 + (int)$input2;
    }

    private function validateString(string $string): bool
    {
        return preg_match('/^\-?\d+$/', $string);
    }
}

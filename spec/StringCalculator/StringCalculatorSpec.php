<?php

namespace spec\StringCalculator;

use PhpSpec\ObjectBehavior;
use StringCalculator\StringCalculator;

class StringCalculatorSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(StringCalculator::class);
    }

    public function it_can_perform_addition()
    {
        $this->calculate('1 + 19')->shouldReturn(20);
    }

    public function it_throws_an_exception_when_input_is_invalid()
    {
        $this->shouldThrow(\InvalidArgumentException::class)
            ->during('calculate', ['1 +'])
        ;
    }

    public function it_can_perform_additional_substraction()
    {
        $this->calculate('1 + 19 - 2')->shouldReturn(18);
    }
}

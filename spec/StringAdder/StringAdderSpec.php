<?php

namespace spec\StringAdder;

use InvalidArgumentException;
use PhpSpec\ObjectBehavior;
use StringAdder\StringAdder;

class StringAdderSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(StringAdder::class);
    }

    function it_adds_two_strings()
    {
        $this->add('1', '1')->shouldReturn(2);
    }

    function it_throws_an_exception_when_input_is_invalid()
    {
        $this->shouldThrow(InvalidArgumentException::class)
            ->during('add', ['abc', '1']);
    }

    function it_can_add_minus_strings()
    {
        $this->add('5', '-1')->shouldReturn(4);
    }
}

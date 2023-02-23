<?php

namespace spec\BowlingGame;

use BowlingGame\Game;
use PhpSpec\ObjectBehavior;

class GameSpec extends ObjectBehavior
{
    public function it_is_initializable()
    {
        $this->shouldHaveType(Game::class);
    }

    public function it_can_calculate_score_without_spare_or_strike()
    {
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);

        $this->getScore()->shouldReturn(20);
    }

    public function it_can_calculate_score_with_spare()
    {
        $this->play(5);
        $this->play(5);
        $this->play(4);
        $this->play(6);
        $this->play(3);
        $this->play(7);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(2);
        $this->play(8);
        $this->play(1);
        $this->play(1);

        $this->getScore()->shouldReturn(61);
    }

    public function it_can_calculate_spare_and_strike()
    {
        $this->play(10);

        $this->play(0);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(1);
        $this->play(10);

        $this->play(1);
        $this->play(1);

        $this->getScore()->shouldReturn(38);
    }
}

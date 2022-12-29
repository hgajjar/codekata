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
}

<?php

namespace BowlingGame;

class Game
{
    /** @var array<Frame> */
    private array $frames = [];

    public function play(int $score): void
    {
        $lastFrame = end($this->frames);

        if (!$lastFrame // initial
            || (null !== $lastFrame->getFirstShot() && null !== $lastFrame->getSecondShot()) // both shots have values
            || 10 === $lastFrame->getFirstShot()) { // strike
            $lastFrame = new Frame();
            $this->frames[] = $lastFrame;
        }

        if (null === $lastFrame->getFirstShot()) {
            $lastFrame->setFirstShot($score);
        } else {
            $lastFrame->setSecondShot($score);
        }
    }

    public function getScore(): int
    {
        $totalScore = 0;

        foreach ($this->frames as $index => $frame) {
            $totalScore += $frame->getFirstShot();
            $totalScore += $frame->getSecondShot();

            if (10 === $frame->getFirstShot()) {
                // strike
                $totalScore += ($this->frames[$index + 1]->getFirstShot() + $this->frames[$index + 1]->getSecondShot());
            } elseif (($frame->getFirstShot() + $frame->getSecondShot()) == 10) {
                // spare
                $totalScore += $this->frames[$index + 1]->getFirstShot();
            }
        }

        return $totalScore;
    }
}

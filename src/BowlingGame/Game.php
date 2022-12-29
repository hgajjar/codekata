<?php

namespace BowlingGame;

class Game
{
    /** @var array<Frame> */
    private array $frames = [];

    public function play(int $score): void
    {
        $lastFrame = end($this->frames);
        if (!$lastFrame || (null !== $lastFrame->getFirstShot() && null !== $lastFrame->getSecondShot())) {
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
        return array_reduce($this->frames, fn (int $carry, Frame $item): int => $carry + $item->getFirstShot() + $item->getSecondShot(), 0);
    }
}

<?php

namespace BowlingGame;

class Frame
{
    private ?int $firstShot = null;
    private ?int $secondShot = null;

    public function getFirstShot(): ?int
    {
        return $this->firstShot;
    }

    public function setFirstShot(int $firstShot): self
    {
        $this->firstShot = $firstShot;

        return $this;
    }

    public function getSecondShot(): ?int
    {
        return $this->secondShot;
    }

    public function setSecondShot(int $secondShot): self
    {
        $this->secondShot = $secondShot;

        return $this;
    }
}

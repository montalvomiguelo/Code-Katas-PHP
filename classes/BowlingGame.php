<?php

namespace Acme;

class BowlingGame {

    protected $rolls = [];

    public function roll($pins)
    {
        $this->guardAgainstInvalidRoll($pins);
        $this->rolls[] = $pins;
    }

    protected function isSpare($roll) {
        return $this->rolls[$roll] + $this->rolls[$roll +1] == 10;
    }

    public function score()
    {
        $score = 0;
        $roll = 0;

        for ($frame = 1; $frame <= 10; $frame++)
        {
            if ($this->isStrike($roll))
            {
                $score += 10 + $this->strikeBonus($roll);
                $roll += 1;
            }
            elseif ($this->isSpare($roll))
            {
                $score += 10 + $this->spareBonus($roll);
                $roll += 2;
            }
            else {
                $score += $this->getDefaultFrameScore($roll);
                $roll += 2;
            }

        }

        return $score;
    }

    protected function strikeBonus($roll)
    {
        return $this->rolls[$roll + 1] + $this->rolls[$roll + 2];
    }

    protected function getDefaultFrameScore($roll) {
        return $this->rolls[$roll] + $this->rolls[$roll + 1];
    }

    protected function isStrike($roll)
    {
        return $this->rolls[$roll] == 10;
    }

    protected function spareBonus($rol)
    {
        return $this->rolls[$roll + 2];
    }

    protected function guardAgainstInvalidRoll($pins)
    {
        if ($pins < 0)
        {
            throw new \Exception;
        }
    }

}

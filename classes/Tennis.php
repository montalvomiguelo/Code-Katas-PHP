<?php

namespace Acme;

class Tennis {

    protected $player1;
    protected $player2;
    protected $lookup = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty'
    ];

    public function __construct(Player $player1, Player $player2)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
    }

    public function score()
    {
        if ($this->hasAWinner())
        {
            return 'Win for ' . $this->winner()->name;
        }

        if ($this->hasTheAdvantage())
        {
            return 'Advantage ' . $this->winner()->name;
        }

        if($this->inDeuce())
        {
            return 'Deuce';
        }

        return $this->generalScore();

    }

    protected function tied()
    {
        return $this->player1->points == $this->player2->points;
    }

    protected function hasAWinner()
    {

        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByAtLeastTwo();

    }

    protected function hasTheAdvantage()
    {
        return $this->hasEnoughPointsToBeWon() && $this->isLeadingByOne();
    }

    protected function inDeuce()
    {
        return $this->player1->points + $this->player2->points >= 6 && $this->tied();
    }

    protected function winner()
    {
        return ($this->player1->points > $this->player2->points) ? $this->player1 : $this->player2;
    }

    protected function hasEnoughPointsToBeWon()
    {
        return max([$this->player1->points, $this->player2->points]) >= 4;
    }

    protected function isLeadingByOne()
    {
        return abs($this->player1->points - $this->player2->points) == 1;
    }

    protected function isLeadingByAtLeastTwo()
    {
        return abs($this->player1->points - $this->player2->points) >= 2;
    }

    protected function generalScore()
    {
        $score = $this->lookup[$this->player1->points] . '-'; // 1-0 Fifteen-Love

        $score .=  $this->tied() ? 'All' : $this->lookup[$this->player2->points];

        return $score;

    }

}

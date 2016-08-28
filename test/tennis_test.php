<?php

require '../vendor/simpletest/simpletest/autorun.php';
require '../vendor/autoload.php';

use Acme\Tennis;
use Acme\Player;

class TennisTest extends UnitTestCase {

    protected $john;
    protected $jane;
    protected $game;

    function setUp()
    {
        $this->john = new Player('John Doe', 0);
        $this->jane = new Player('Jane Doe', 0);
        $this->game = new Tennis($this->john, $this->jane);
    }

    function testScoresScorelessGame()
    {
        $this->assertEqual($this->game->score(), 'Love-All');
    }

    function testScores1to0Game()
    {
        $this->john->earnPoints(1);
        $this->assertEqual($this->game->score(), 'Fifteen-Love');
    }

    function testScores2to0Game()
    {
        $this->john->earnPoints(2);
        $this->assertEqual($this->game->score(), 'Thirty-Love');
    }

    function testScores3to0Game()
    {
        $this->john->earnPoints(3);
        $this->assertEqual($this->game->score(), 'Forty-Love');
    }

    function testScores4to0Game()
    {
        $this->john->earnPoints(4);
        $this->assertEqual($this->game->score(), 'Win for John Doe');
    }

    function testScores0to4Game()
    {
        $this->jane->earnPoints(4);
        $this->assertEqual($this->game->score(), 'Win for Jane Doe');
    }

    function testScores4to3Game()
    {
        $this->john->earnPoints(4);
        $this->jane->earnPoints(3);

        $this->assertEqual($this->game->score(), 'Advantage John Doe');
    }
    function testScores3to4Game()

    {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(4);

        $this->assertEqual($this->game->score(), 'Advantage Jane Doe');
    }

    function testScores3to3Game()
    {
        $this->john->earnPoints(3);
        $this->jane->earnPoints(3);

        $this->assertEqual($this->game->score(), 'Deuce');
    }

    function testScores8to8Game()
    {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(8);

        $this->assertEqual($this->game->score(), 'Deuce');
    }

    function testScores8to9Game()
    {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(9);

        $this->assertEqual($this->game->score(), 'Advantage Jane Doe');

    }

    function testScores8to10Game()
    {
        $this->john->earnPoints(8);
        $this->jane->earnPoints(10);

        $this->assertEqual($this->game->score(), 'Win for Jane Doe');

    }

}

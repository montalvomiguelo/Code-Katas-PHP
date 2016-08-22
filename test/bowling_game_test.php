<?php

require '../vendor/simpletest/simpletest/autorun.php';
require '../vendor/autoload.php';

use Acme\BowlingGame;

class BowlingGameTest extends UnitTestCase {

    function testNewGame()
    {
        $game = new BowlingGame;

        $this->rollTimes($game, 20, 0);

        $this->assertEqual($game->score(), 0);
    }

    function testSumAllKnockedDownPinsGame()
    {
        $game = new BowlingGame;

        $this->rollTimes($game, 20, 1);

        $this->assertEqual($game->score(), 20);

    }

    function testAwardsOneRollBonusEverySpare()
    {
        $game = new BowlingGame;

        $this->rollSpare($game);
        $game->roll(5);

        $this->rollTimes($game, 17, 0);

        $this->assertEqual($game->score(), 20);

    }

    function testAwardsTwoRollBonusForStrickeInPreviousFrame()
    {
        $game = new BowlingGame;

        $game->roll(10);
        $game->roll(7);
        $game->roll(2);

        $this->rollTimes($game, 17, 0);

        $this->assertEqual($game->score(), 28);
    }

    function testAPerfectGame()
    {
        $game = new BowlingGame;

        $this->rollTimes($game, 12, 10);

        $this->assertEqual($game->score(), 300);

    }

    function testTakesExceptionWithInvalidRolls()
    {
        $game = new BowlingGame;

        $this->expectException();

        $game->roll(-10);

    }

    private function rollSpare($game) {
        $game->roll(2);
        $game->roll(8);
    }

    private function rollTimes($game, $count, $pins) {
        for ($i = 0; $i < $count; $i++)
        {
            $game->roll($pins);
        }
    }

}

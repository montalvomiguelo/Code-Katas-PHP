<?php

require '../vendor/simpletest/simpletest/autorun.php';
require '../vendor/autoload.php';

use Acme\FizzBuzz;

class FizzBuzzTest extends UnitTestCase {

    function testTranslate1()
    {
        $this->assertEqual(FizzBuzz::translate(1), 1);
    }

    function testTranslate2()
    {
        $this->assertEqual(FizzBuzz::translate(2), 2);
    }

    function testTranslate3()
    {
        $this->assertEqual(FizzBuzz::translate(3), 'fizz');
    }

    function testTranslate4()
    {
        $this->assertEqual(FizzBuzz::translate(4), 4);
    }

    function testTranslate5()
    {
        $this->assertEqual(FizzBuzz::translate(5), 'buzz');
    }

    function testTranslate6()
    {
        $this->assertEqual(FizzBuzz::translate(6), 'fizz');
    }

    function testTranslate10()
    {
        $this->assertEqual(FizzBuzz::translate(10), 'buzz');
    }

    function testTranslateSequenceUpTo5()
    {
        $this->assertEqual(FizzBuzz::translateUpTo(5), [1, 2, 'fizz', 4, 'buzz']);
    }

    function testTranslateSequenceUpTo10()
    {
        $this->assertEqual(FizzBuzz::translateUpTo(10), [1, 2, 'fizz', 4, 'buzz', 'fizz', 7, 8, 'fizz', 'buzz']);
    }

}

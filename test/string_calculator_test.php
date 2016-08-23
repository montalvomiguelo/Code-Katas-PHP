<?php

require '../vendor/simpletest/simpletest/autorun.php';
require '../vendor/autoload.php';

use Acme\StringCalculator;

class RomanNumeralsTest extends UnitTestCase {

    function testAddEmptyString()
    {
        $this->assertEqual(StringCalculator::add(''), 0);
    }

    function testAddOneNumber()
    {
        $this->assertEqual(StringCalculator::add('2'), 2);
    }

    function testAddTwoNumbers()
    {
        $this->assertEqual(StringCalculator::add('1, 2'), 3);
    }

    function testAddWithAnyAmoutOfNumber()
    {
        $this->assertEqual(StringCalculator::add('3, 3, 1, 5, 2'), 14);
    }

    function testAddDisallowsNegativeNumbers()
    {
        $this->expectException(new \InvalidArgumentException("Negative numbers are not allowed [-1]"));
        StringCalculator::add('-1, 1, 2');
    }

    function testAddIgnoresAnyNumberGreaterThanOrEqualToOneThousand()
    {
        $this->assertEqual(StringCalculator::add('1, 2, 3, 1000'), 6);
    }

    function testAddAllowsNewLineDelimiters()
    {
        $this->assertEqual(StringCalculator::add('2, 2\n2 \n2'), 8);
    }

}

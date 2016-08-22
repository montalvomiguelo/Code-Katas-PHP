<?php

require '../vendor/simpletest/simpletest/autorun.php';
require '../vendor/autoload.php';

use Acme\RomanNumerals;

class RomanNumeralsTest extends UnitTestCase {

    function testGenerate() {
        $this->assertEqual(RomanNumerals::generate(1), 'I');
        $this->assertEqual(RomanNumerals::generate(2), 'II');
        $this->assertEqual(RomanNumerals::generate(3), 'III');
        $this->assertEqual(RomanNumerals::generate(4), 'IV');
        $this->assertEqual(RomanNumerals::generate(5), 'V');
        $this->assertEqual(RomanNumerals::generate(6), 'VI');
        $this->assertEqual(RomanNumerals::generate(7), 'VII');
        $this->assertEqual(RomanNumerals::generate(8), 'VIII');
        $this->assertEqual(RomanNumerals::generate(9), 'IX');
        $this->assertEqual(RomanNumerals::generate(10), 'X');
        $this->assertEqual(RomanNumerals::generate(20), 'XX');
        $this->assertEqual(RomanNumerals::generate(36), 'XXXVI');
        $this->assertEqual(RomanNumerals::generate(45), 'XLV');
        $this->assertEqual(RomanNumerals::generate(100), 'C');
        $this->assertEqual(RomanNumerals::generate(982), 'CMLXXXII');
        $this->assertEqual(RomanNumerals::generate(1995), 'MCMXCV');
        $this->assertEqual(RomanNumerals::generate(2564), 'MMDLXIV');
        $this->assertEqual(RomanNumerals::generate(4990), 'MMMMCMXC');
        $this->assertEqual(RomanNumerals::generate(5000), 'MMMMM');
        $this->assertEqual(RomanNumerals::generate(5394), 'MMMMMCCCXCIV');
    }

}

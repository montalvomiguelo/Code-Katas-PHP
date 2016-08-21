<?php

require '../vendor/simpletest/simpletest/autorun.php';
require '../vendor/autoload.php';

use Acme\PrimeFactors;

class PrimeFactorsTest extends UnitTestCase {

    function testGenerate() {
        $this->assertEqual(PrimeFactors::generate(1), []);
        $this->assertEqual(PrimeFactors::generate(2), [2]);
        $this->assertEqual(PrimeFactors::generate(3), [3]);
        $this->assertEqual(PrimeFactors::generate(4), [2, 2]);
        $this->assertEqual(PrimeFactors::generate(5), [5]);
        $this->assertEqual(PrimeFactors::generate(6), [2, 3]);
        $this->assertEqual(PrimeFactors::generate(7), [7]);
        $this->assertEqual(PrimeFactors::generate(8), [2, 2, 2]);
        $this->assertEqual(PrimeFactors::generate(9), [3, 3]);
        $this->assertEqual(PrimeFactors::generate(10), [2, 5]);
        $this->assertEqual(PrimeFactors::generate(36), [2, 2, 3, 3]);
        $this->assertEqual(PrimeFactors::generate(48), [2, 2, 2, 2, 3]);
        $this->assertEqual(PrimeFactors::generate(76), [2, 2, 19]);
        $this->assertEqual(PrimeFactors::generate(80), [2, 2, 2, 2, 5]);
        $this->assertEqual(PrimeFactors::generate(100), [2, 2, 5, 5]);
    }

}

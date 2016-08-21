<?php

namespace Acme;

class PrimeFactors {
    public static function generate($number) {
        $divisor = 2;
        $primeFactors = [];

        do {
            if ($number % $divisor == 0) {
                $primeFactors[] = $divisor;
                $number /= $divisor;
                $divisor = 2;
            } else {
                $divisor += 1;
            }
        } while ($divisor <= $number);

        return $primeFactors;

    }

}

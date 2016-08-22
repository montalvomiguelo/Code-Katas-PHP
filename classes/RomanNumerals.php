<?php

namespace Acme;

class RomanNumerals {

    protected static $symbols = [
        'M' => 1000,
        'CM' => 900,
        'D' => 500,
        'CD' => 400,
        'C' => 100,
        'XC' => 90,
        'L' => 50,
        'XL' => 40,
        'X' => 10,
        'IX' => 9,
        'V' => 5,
        'IV' => 4,
        'I' => 1,
    ];


    public static function generate($number) {
        $solution = '';

        foreach (self::$symbols as $symbol => $value) {
            while ($value <= $number) {
                $solution .= $symbol;
                $number -= $value;
            }
        }

        return $solution;

    }

}

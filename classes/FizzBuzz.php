<?php

namespace Acme;

class FizzBuzz {

    public static function translate($number)
    {
        if ($number % 15 == 0) return 'fizzbuzz';

        if ($number % 5 == 0) return 'buzz';

        if ($number % 3 == 0) return 'fizz';

        return $number;

    }

    public static function translateUpTo($number)
    {
        return array_map(function($i)
        {
            return static::translate($i);
        }, range(1, $number));
    }


}

<?php

namespace Acme;

class StringCalculator {

    const MAX_NUMBER_ALLOWED = 1000;

    public static function add($numbers)
    {
        $numbers = self::parseNumbers($numbers);

        $solution = 0;

        foreach ($numbers as $number)
        {
            self::guardAgainstNegativeNumber($number);

            if ($number >= self::MAX_NUMBER_ALLOWED) continue;

            $solution += $number;
        }

        return $solution;

    }

    protected function guardAgainstNegativeNumber($number)
    {
        if ($number < 0) throw new \InvalidArgumentException("Negative numbers are not allowed [{$number}]");
    }

    protected function parseNumbers($numbers)
    {
        return array_map('intval', split('[,\n]', $numbers));
    }

}

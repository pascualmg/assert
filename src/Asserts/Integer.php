<?php


namespace pascualmg\assert\Asserts;


final class Integer
{

    public static function isMoreThan(int $max)
    {
        $moreThan =  static fn(int $max) => static fn(int $value) => $value > $max;
        return $moreThan($max);
    }

    public static function isLessThan(int $min)
    {
        $lessThan = static fn(int $value) => static fn(int $value) => $value < $min;
        return $lessThan($min);
    }

    public static function isMeaningOfLive()
    {
        return static fn(mixed $someTimesAlphaAndOmega) => 42 === (int)$someTimesAlphaAndOmega;
    }
}
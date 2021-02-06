<?php

namespace pascualmg\assert\test;

class IntegerMother
{
    public static function NaturalNumber(): int
    {
        return random_int(1, PHP_INT_MAX);
    }

    public static function NaturalNumberLessThan(int $max): int
    {
        return random_int(0, $max - 1);
    }
}
<?php


namespace pascualmg\assert;


use InvalidArgumentException;

class Assert
{
    public static function that(mixed $value): callable
    {
        return static function (
            callable $assertionCallback,
            string $reason = '',
            ?string $exceptionToLaunch = null
        ) use (
            $value
        ) {
            if ($assertionCallback($value)) {
                return self::that($value);
            }
            if (null === $exceptionToLaunch) {
                throw new InvalidArgumentException("value { $value } , reason { $reason }");
            }
            throw new $exceptionToLaunch($reason);
        };
    }
}
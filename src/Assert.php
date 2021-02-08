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
    public static function compose(callable $a, callable $b) {
        return static fn ($value) => $a($value) && $b($value);
    }

    public static function identity(mixed $a){
        return null;
    }

}
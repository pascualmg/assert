<?php

namespace pascualmg\assert\test;
use pascualmg\assert\Assert;
use pascualmg\assert\Asserts\Integer;
use pascualmg\assert\Asserts\IsType;
use PHPUnit\Framework\TestCase;

class AssertTest extends TestCase
{
    public function test_given_one_integer_when_assert_is_less_than_other_then_i_trhow_invalid_argument_exception()
    {
        $max = IntegerMother::NaturalNumber();
        $min = IntegerMother::NaturalNumberLessThan($max);

        assert($min < $max);


        $this->expectException(\InvalidArgumentException::class);

        Assert::that($max)
        (IsType::integer())
        (Integer::isMoreThan($min))
        (Integer::isMeaningOfLive(), 'im not a 42')
        ;

    }
    public function test_given_one_integer_when_assert_is_less_than_other_then_i_trhow_custom_exception()
    {
        $max = IntegerMother::NaturalNumber();
        $min = IntegerMother::NaturalNumberLessThan($max);

        assert($min < $max);


        $this->expectException(\InvalidArgumentException::class);

        $someException = new class extends \Exception { };

        $this->expectException($someException::class);
        Assert::that($max)
        (IsType::integer())
        (Integer::isMoreThan($min))
        (Integer::isMeaningOfLive(), 'im not a 42', $someException::class)
        ;

    }


}

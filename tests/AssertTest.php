<?php

namespace Pascualmg\assert\test;

use Pascualmg\assert\Assert;
use Pascualmg\assert\Asserts\Integer;
use Pascualmg\assert\Asserts\IsType;
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
        (
            IsType::integer()
        )
        (
            Integer::isMoreThan($min)
        )
        (
            Integer::isMeaningOfLive(),
            'im not a 42'
        );
    }

    public function test_given_one_integer_when_assert_is_less_than_other_then_i_trhow_custom_exception()
    {
        $max = IntegerMother::NaturalNumber();
        $min = IntegerMother::NaturalNumberLessThan($max);

        assert($min < $max);


        $this->expectException(\InvalidArgumentException::class);

        $someException = new class extends \Exception {
        };

        $this->expectException($someException::class);
        Assert::that($max)
        (
            IsType::integer()
        )
        (
            Integer::isMoreThan($min)
        )
        (
            Integer::isMeaningOfLive(),
            'im not a 42',
            $someException::class
        );
    }

    public function test_both_are()
    {
        $isMoreThan23IsLessThan55AndIsMeaningOfLiveAndIsInteger = Assert::bothAre(
            Assert::bothAre(Integer::isMoreThan(23), Integer::isMeaningOfLive()),
            Assert::bothAre(Integer::isLessThan(55), IsType::integer())
        );

        $this->expectNotToPerformAssertions();
        Assert::that(42) ($isMoreThan23IsLessThan55AndIsMeaningOfLiveAndIsInteger);
    }


}

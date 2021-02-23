<?php


namespace Pascualmg\assert\Asserts;


class IsType
{

    public static function integer(): callable
    {
        return 'is_integer';
    }
    public function numeric(): callable
    {
        return 'is_numeric';
    }


}
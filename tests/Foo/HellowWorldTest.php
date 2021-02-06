<?php

namespace Foo;

use pascualmg\skel\Foo\HellowWorld;
use PHPUnit\Framework\TestCase;

class HellowWorldTest extends TestCase
{
    public function testHellowWorld()
    {
        $actual  = new HellowWorld();
        self::assertEquals('Hellow World', $actual());

    }

}

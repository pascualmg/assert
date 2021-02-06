<?php

use pascualmg\skel\Foo\HellowWorld;

require dirname(__DIR__) . '/vendor/autoload.php';

$greeter = static fn() => (new HellowWorld())();

$greeter();




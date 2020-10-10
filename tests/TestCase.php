<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use ReflectionObject;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function setUp():void
    {
        parent::setUp();
        $reflection = new ReflectionObject($this);
        foreach ($reflection->getTraits() as $trait) {
            $traitName = 'setup' . $trait->getShortName();
            foreach ($trait->getMethods() as $method) {
                if (strcasecmp($method->getName(), $traitName) === 0) {
                    $this->$traitName();
                }
            }
        }
    }
}

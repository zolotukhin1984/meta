<?php

namespace App\Tests;

use Monolog\Test\TestCase;
use ReflectionClass;

abstract class AbstractTestCase extends TestCase
{
    protected function setEntityId(object $entity, int $value, $idField = 'id')
    {
        $class = new ReflectionClass($entity);
        $property = $class->getProperty($idField);
        //$property->setAccessible(true);
        $property->setValue($value);
        //$property->setAccessible(false);
    }
}

<?php

namespace Isolate\Tests\LazyObjects;

use Isolate\Framework\LazyObjects\Definition\Factory;
use Isolate\LazyObjects\Proxy\ClassName;
use Isolate\LazyObjects\Proxy\Definition;
use Isolate\LazyObjects\Proxy\LazyProperty;
use Isolate\LazyObjects\Proxy\Method;
use Isolate\LazyObjects\Proxy\Property\Name;
use Isolate\Tests\Double\EntityFake;
use Isolate\Tests\LazyObjects\Property\InitializerStub;

final class DefinitionFactory implements Factory
{
    /**
     * @var null
     */
    private $itemsInitializerValue;

    /**
     * @param null $itemsInitializerValue
     */
    public function __construct($itemsInitializerValue = null)
    {
        $this->itemsInitializerValue = $itemsInitializerValue;
    }

    /**
     * @return Definition
     */
    public function createDefinition()
    {
        $definition = new Definition(
            new ClassName(EntityFake::getClassName()),
            [
                new LazyProperty(
                    new Name("items"),
                    new InitializerStub($this->itemsInitializerValue),
                    [new Method('getItems')]
                )
            ]
        );

        return $definition;
    }
}
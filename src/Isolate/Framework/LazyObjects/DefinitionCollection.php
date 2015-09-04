<?php

namespace Isolate\Framework\LazyObjects;

use Isolate\Framework\LazyObjects\Definition\Factory;
use Isolate\LazyObjects\Proxy\Definition;
use Traversable;

class DefinitionCollection implements \IteratorAggregate
{
    /**
     * @var Definition[]|array
     */
    private $definitions;

    public function __construct(array $elements = array())
    {
        $this->definitions = [];
        
        foreach ($elements as $definitionFactory) {
            $this->validateFactory($definitionFactory);
            $definition = $definitionFactory->createDefinition();
            $this->validateDefinition($definition);

            $this->definitions[] = $definition;
        }
    }

    /**
     * @param mixed $value
     * @return bool
     */
    public function add(Factory $definitionFactory)
    {
        $definition = $definitionFactory->createDefinition();
        $this->validateDefinition($definition);
        
        $this->definitions[] = $definition;
    }

    /**
     * @return \ArrayIterator
     */
    public function getIterator()
    {
        return new \ArrayIterator($this->definitions);
    }

    /**
     * @param $definitionFactory
     */
    private function validateFactory($definitionFactory)
    {
        if (!$definitionFactory instanceof Factory) {
            throw new \InvalidArgumentException("Definition collection elements needs to implement Definition\\Factory.");
        }
    }

    /**
     * @param $definition
     */
    private function validateDefinition($definition)
    {
        if (!$definition instanceof Definition) {
            throw new \RuntimeException("Definition\\Factory needs to create Entity\\Definition instance.");
        }
    }
}

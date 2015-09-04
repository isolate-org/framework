<?php

namespace Isolate\Framework\UnitOfWork\Entity;

use Isolate\Framework\UnitOfWork\Entity\Definition\Factory;
use Isolate\UnitOfWork\Entity\Definition;

class DefinitionCollection implements \IteratorAggregate 
{
    private $definitions;

    /**
     * @param array $elements
     */
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
     * @param Factory $definitionFactory
     * @return bool
     */
    public function add(Factory $definitionFactory)
    {
        $definition = $definitionFactory->createDefinition();
        $this->validateDefinition($definition);
        
        $this->definitions[] = $definition;
    }

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

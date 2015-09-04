<?php

namespace Isolate\Tests\ClassDefinition;

use Isolate\Framework\UnitOfWork\Entity\Definition\Factory;
use Isolate\Tests\Double\EditCommandHandlerMock;
use Isolate\Tests\Double\NewCommandHandlerMock;
use Isolate\Tests\Double\RemoveCommandHandlerMock;
use Isolate\UnitOfWork\Entity\Definition;

final class EntityDefinitionFactory implements Factory
{
    /**
     * @var Definition
     */
    private $entityDefinition;

    /**
     * @param Definition $entityDefinition
     */
    public function __construct(Definition $entityDefinition)
    {

        $this->entityDefinition = $entityDefinition;
    }

    /**
     * @return Definition
     */
    public function createDefinition()
    {
        $this->entityDefinition->setNewCommandHandler(new NewCommandHandlerMock());
        $this->entityDefinition->setEditCommandHandler(new EditCommandHandlerMock());
        $this->entityDefinition->setRemoveCommandHandler(new RemoveCommandHandlerMock());
        
        return $this->entityDefinition;
    }
}
<?php

namespace Isolate\Framework\UnitOfWork\Entity\Definition;

use Isolate\UnitOfWork\Entity\Definition;

interface Factory
{
    /**
     * @return Definition
     */
    public function createDefinition();
}

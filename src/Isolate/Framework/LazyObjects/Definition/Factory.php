<?php

namespace Isolate\Framework\LazyObjects\Definition;

use Isolate\LazyObjects\Proxy\Definition;

interface Factory
{
    /**
     * @return Definition
     */
    public function createDefinition();
}

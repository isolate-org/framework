<?php

namespace Isolate\Framework\PersistenceContext\Transaction;

use Isolate\PersistenceContext\Name;
use Isolate\PersistenceContext\Transaction\Factory;

/**
 * @api
 */
final class FactoryMap
{
    /**
     * @var array|Factory
     */
    private $factories;

    public function __construct()
    {
        $this->factories = [];
    }

    /**
     * @param Factory $transactionFactory
     * @param Name $contextName
     * 
     * @api
     */
    public function addFactory(Name $contextName, Factory $transactionFactory)
    {
        $this->factories[(string) $contextName] = $transactionFactory;
    }

    /**
     * @param Name $contextName
     * @return bool
     * 
     * @api
     */
    public function hasFactory(Name $contextName)
    {
        return array_key_exists((string) $contextName, $this->factories);
    }

    /**
     * @param Name $contextName
     * @return Factory
     * 
     * @api
     */
    public function getFactory(Name $contextName)
    {
        return $this->factories[(string) $contextName];
    }
}

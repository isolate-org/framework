<?php

namespace Isolate\Framework\PersistenceContext\Transaction;

use Isolate\PersistenceContext;
use Isolate\Framework\PersistenceContext\Transaction;
use Isolate\PersistenceContext\Transaction\Factory as TransactionFactory;
use Isolate\UnitOfWork\Factory as UOWFactory;

/**
 * @api
 */
class IsolateFactory implements TransactionFactory
{
    /**
     * @var UOWFactory
     */
    private $uowFactory;

    /**
     * @param UOWFactory $uowFactory
     */
    public function __construct(UOWFactory $uowFactory)
    {
        $this->uowFactory = $uowFactory;
    }

    /**
     * @param PersistenceContext $persistenceContext
     * @return Transaction
     * 
     * @api
     */
    public function create(PersistenceContext $persistenceContext)
    {
        return new Transaction($this->uowFactory->create());
    }
}

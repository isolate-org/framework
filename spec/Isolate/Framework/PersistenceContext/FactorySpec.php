<?php

namespace spec\Isolate\Framework\PersistenceContext;

use Isolate\Framework\PersistenceContext\Transaction\FactoryMap;
use Isolate\PersistenceContext\Name;
use PhpSpec\ObjectBehavior;
use Isolate\PersistenceContext\Transaction\Factory as TransactionFactory;

class FactorySpec extends ObjectBehavior
{
    function let(TransactionFactory $transactionFactory)
    {
        $this->beConstructedWith($transactionFactory, new FactoryMap());
    }
    
    function it_creates_isolate_context()
    {
        $this->create(new Name("context"))->shouldReturnAnInstanceOf("Isolate\\Framework\\PersistenceContext\\IsolateContext");
    }
}
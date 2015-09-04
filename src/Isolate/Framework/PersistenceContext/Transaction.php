<?php

namespace Isolate\Framework\PersistenceContext;

use Isolate\PersistenceContext\Transaction as BaseTransaction;
use Isolate\UnitOfWork\UnitOfWork;

/**
 * @api
 */
class Transaction implements BaseTransaction
{
    /**
     * @var UnitOfWork
     */
    private $unitOfWork;

    /**
     * @param UnitOfWork $unitOfWork
     */
    public function __construct(UnitOfWork $unitOfWork)
    {
        $this->unitOfWork = $unitOfWork;
    }

    /**
     * @return void
     * 
     * @api
     */
    public function commit()
    {
        $this->unitOfWork->commit();
    }

    /**
     * @return void
     * 
     * @api
     */
    public function rollback()
    {
        $this->unitOfWork->rollback();
    }

    /**
     * @param mixed $entity
     * @return boolean
     * 
     * @api
     */
    public function contains($entity)
    {
        return $this->unitOfWork->isRegistered($entity);
    }

    /**
     * @param mixed $entity
     * 
     * @api
     */
    public function persist($entity)
    {
        $this->unitOfWork->register($entity);
    }

    /**
     * @param mixed $entity
     * 
     * @api
     */
    public function delete($entity)
    {
        $this->unitOfWork->remove($entity);
    }
}

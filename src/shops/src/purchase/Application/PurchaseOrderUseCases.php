<?php

namespace PurchaseTest\Shops\Purchase\Application;

use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\PurchaseOrderRepository;

abstract class PurchaseOrderUseCases
{
    protected $repository;

    public function __construct(PurchaseOrderRepository $repository)
    {
        $this->repository = $repository;
    }
}
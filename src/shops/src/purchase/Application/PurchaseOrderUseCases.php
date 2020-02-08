<?php

namespace PurchaseTest\Shops\Purchase\Application;

use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\OrderRepository;

abstract class PurchaseOrderUseCases
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }
}
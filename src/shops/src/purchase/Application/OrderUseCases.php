<?php

namespace PurchaseTest\Shops\Purchase\Application;

use PurchaseTest\Shops\Purchase\Domain\Order\OrderRepository;

abstract class OrderUseCases
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }
}
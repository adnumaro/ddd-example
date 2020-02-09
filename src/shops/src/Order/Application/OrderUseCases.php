<?php

namespace Shops\Order\Application;

use Shops\Order\Domain\Order\OrderRepository;

abstract class OrderUseCases
{
    protected $repository;

    public function __construct(OrderRepository $repository)
    {
        $this->repository = $repository;
    }
}

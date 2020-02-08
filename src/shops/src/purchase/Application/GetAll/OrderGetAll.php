<?php

namespace PurchaseTest\Shops\Purchase\Application\GetAll;

use PurchaseTest\Shops\Purchase\Application\OrderUseCases;

final class OrderGetAll extends OrderUseCases
{
    public function __invoke()
    {
        return $this->repository->getAll();
    }
}
<?php

namespace PurchaseTest\Shops\Purchase\Application\Extract;

use PurchaseTest\Shops\Purchase\Application\PurchaseOrderUseCases;

final class PurchaseOrderGetAll extends PurchaseOrderUseCases
{
    public function __invoke()
    {
        return $this->repository->extract();
    }
}
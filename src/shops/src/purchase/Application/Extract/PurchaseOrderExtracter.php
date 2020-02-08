<?php

namespace PurchaseTest\Shops\Purchase\Application\Extract;

use PurchaseTest\Shops\Purchase\Application\PurchaseOrderUseCases;

final class PurchaseOrderExtracter extends PurchaseOrderUseCases
{
    public function __invoke()
    {
        return $this->repository->extract();
    }
}
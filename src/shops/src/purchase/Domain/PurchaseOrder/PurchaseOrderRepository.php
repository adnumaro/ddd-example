<?php

namespace PurchaseTest\Shops\Purchase\Domain\PurchaseOrder;

interface PurchaseOrderRepository
{
    public function insert(PurchaseOrder $purchaseOrder) : void;

    public function extract() : array;
}

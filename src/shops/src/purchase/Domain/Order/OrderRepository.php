<?php

namespace PurchaseTest\Shops\Purchase\Domain\Order;

use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Reference;

interface OrderRepository
{
    public function insert(Order $Order) : void;

    public function getAll() : array;

    public function exist (Reference $reference) : bool;
}

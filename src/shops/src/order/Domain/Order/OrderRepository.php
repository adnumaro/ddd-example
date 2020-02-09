<?php

namespace Shops\Order\Domain\Order;

use Shops\Order\Domain\Order\ValueObject\Reference;

interface OrderRepository
{
    public function insert(Order $Order) : void;

    public function getAll() : array;

    public function exist (Reference $reference) : bool;
}

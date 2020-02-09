<?php

namespace Shops\Order\Infrastructure\Repository;

use Shops\Order\Domain\Order\Order;
use Shops\Order\Domain\Order\OrderRepository;
use Shops\Order\Domain\Order\ValueObject\Reference;

final class InMemoryOrderRepository implements OrderRepository
{
    private $items = [];

    public function insert(Order $order) : void
    {
        array_push($this->items, $order);
    }

    public function getAll() : array
    {
        return $this->items;
    }

    public function exist(Reference $reference) : bool
    {
        foreach ($this->items as $item) {
            if ($item->getReference()->isEqual($reference)) {
                return true;
            }
        }

        return false;
    }
}

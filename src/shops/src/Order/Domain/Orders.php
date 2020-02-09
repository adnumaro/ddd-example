<?php

namespace Shops\Order\Domain;

use Shared\Domain\Collection;
use Shops\Order\Domain\Exception\OrdersItemsMustBeInstanceOfOrderException;
use Shops\Order\Domain\Order\Order;

final class Orders extends Collection
{
    /**
     * @return Order|null
     */
    public function current() : ?Order
    {
        return parent::current();
    }

    /**
     * @param mixed $offset
     *
     * @return Order|null
     */
    public function offsetGet($offset) : ?Order
    {
        return parent::offsetGet($offset);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) : void
    {
        if (!$value instanceof Order) {
            throw new OrdersItemsMustBeInstanceOfOrderException();
        }

        parent::offsetSet($offset, $value);
    }
}

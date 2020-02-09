<?php

namespace Shops\Order\Domain\Order\ValueObject;

use InvalidArgumentException;
use Shared\Domain\ValueObject\CollectionValueObject;
use Shops\Order\Domain\LineItem\LineItem;

final class LineItems extends CollectionValueObject
{
    public function __construct(array $items)
    {
        if ($this->hasAtLeastOneItem($items)) {
            parent::__construct($items);
        }
    }

    /**
     * @return LineItem|null
     */
    public function current() : ?LineItem
    {
        return parent::current();
    }

    /**
     * @param mixed $offset
     *
     * @return LineItem|null
     */
    public function offsetGet($offset) : ?LineItem
    {
        return parent::offsetGet($offset);
    }

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value) : void
    {
        if (!$value instanceof LineItem) {
            throw new InvalidArgumentException("value must be instance of LineItem.");
        }

        parent::offsetSet($offset, $value);
    }

    /**
     * @param array $value
     *
     * @return bool
     */
    private function hasAtLeastOneItem(array $value) : bool
    {
        if (count($value) > 0) {
            return true;
        }

        throw new InvalidArgumentException('The order must have at least one line item');
    }
}

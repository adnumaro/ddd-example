<?php

namespace Shops\Order\Domain\LineItem\ValueObject;

use Shared\Domain\ValueObject\FloatValueObject;
use Shops\Order\Domain\LineItem\Exception\LineItemQuantityLowerThanOneException;

final class Quantity extends FloatValueObject
{
    public function __construct(float $value)
    {
        if ($value < 1) {
            throw new LineItemQuantityLowerThanOneException($value);
        }

        parent::__construct($value);
    }
}

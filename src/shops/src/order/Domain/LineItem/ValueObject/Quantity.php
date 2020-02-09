<?php

namespace Shops\Order\Domain\LineItem\ValueObject;

use http\Exception\InvalidArgumentException;
use Shared\Domain\ValueObject\FloatValueObject;

final class Quantity extends FloatValueObject
{
    public function __construct(float $value)
    {
        if ($value === 0) {
            throw new InvalidArgumentException('Order item quantity cannot be 0');
        }

        parent::__construct($value);
    }
}

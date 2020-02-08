<?php

namespace PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject;

use http\Exception\InvalidArgumentException;
use PurchaseTest\Shared\Domain\ValueObject\FloatValueObject;

final class Amount extends FloatValueObject
{
    public function __construct(float $value)
    {
        if ($value === 0) {
            throw new InvalidArgumentException('Order item amount cannot be 0');
        }

        parent::__construct($value);
    }
}

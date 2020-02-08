<?php

namespace PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject;

use http\Exception\InvalidArgumentException;
use PurchaseTest\Shared\Domain\ValueObject\FloatValueObject;

final class Amount extends FloatValueObject
{
    public function __construct(float $value)
    {
        if ($value === 0) {
            throw new InvalidArgumentException('The invoice amount cannot be 0');
        }

        parent::__construct($value);
    }
}
<?php

namespace PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject;

use DateTime;
use InvalidArgumentException;
use PurchaseTest\Shared\Domain\ValueObject\DateValueObject;

final class EmissionDate extends DateValueObject
{
    public function __construct(DateTime $value)
    {
        $now = new DateTime();

        if ($value < $now) {
            throw new InvalidArgumentException('The purchase order cannot be less than today');
        }

        parent::__construct($value);
    }
}
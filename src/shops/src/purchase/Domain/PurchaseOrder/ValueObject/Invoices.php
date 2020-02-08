<?php

namespace PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject;

use http\Exception\InvalidArgumentException;
use PurchaseTest\Shared\Domain\ValueObject\ArrayValueObject;

final class Invoices extends ArrayValueObject
{
    public function __construct(array $value)
    {
        $notInvoices = array_filter($value, function ($item) {
            return !is_a($item, 'Invoice');
        });

        if (count($value) === 0) {
            throw new InvalidArgumentException('The purchase order must have at least one invoice');
        }

        if (count($notInvoices) > 0) {
            throw new InvalidArgumentException('The purchase order invoices must be an array of Invoice class');
        }

        parent::__construct($value);
    }
}

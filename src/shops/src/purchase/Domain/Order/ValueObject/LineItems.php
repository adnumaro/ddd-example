<?php

namespace PurchaseTest\Shops\Purchase\Domain\Order\ValueObject;

use http\Exception\InvalidArgumentException;
use PurchaseTest\Shared\Domain\ValueObject\ArrayValueObject;

final class LineItems extends ArrayValueObject
{
    public function __construct(array $value)
    {
        if (
            $this->hasAtLeastOneItem($value) &&
            $this->isArrayOfLineItems($value)
        ) {
            parent::__construct($value);
        }
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

    /**
     * @param $value
     *
     * @return bool
     */
    private function isArrayOfLineItems($value) : bool
    {
        $notInvoices = array_filter($value, function ($item) {
            return !is_a($item, 'LineItem');
        });

        if (count($notInvoices) === 0) {
            return true;
        }

        throw new InvalidArgumentException('The order line items must be an array of LineItem class');
    }
}

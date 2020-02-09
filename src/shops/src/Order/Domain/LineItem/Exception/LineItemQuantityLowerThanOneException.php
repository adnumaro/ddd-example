<?php

namespace Shops\Order\Domain\LineItem\Exception;

use RuntimeException;

class LineItemQuantityLowerThanOneException extends RuntimeException
{
    public function __construct(float $quantity) {
        parent::__construct('Line quantity must be greater than 0, "' . $quantity . '" received');
    }
}
<?php

namespace Shops\Order\Domain\Exception;

use RuntimeException;

class OrdersItemsMustBeInstanceOfOrderException extends RuntimeException
{
    public function __construct() {
        parent::__construct('Orders items must have instances of Order class');
    }
}

<?php

namespace Shops\Order\Domain\Order\Exception;

use Carbon\Carbon;
use RuntimeException;

final class OrderEmissionDateLowerThanTodayException extends RuntimeException
{
    public function __construct(Carbon $date) {
        parent::__construct('Order emission date "' . $date->toDateString() . '" is lower than today');
    }
}
<?php

namespace Shops\Order\Domain\Order\ValueObject;

use Carbon\Carbon;
use Shared\Domain\ValueObject\DateValueObject;
use Shops\Order\Domain\Order\Exception\OrderEmissionDateLowerThanTodayException;

final class EmissionDate extends DateValueObject
{
    public function __construct(Carbon $value)
    {
        $now = Carbon::now();

        if ($now->diffInDays($value) > 0) {
            throw new OrderEmissionDateLowerThanTodayException($value);
        }

        parent::__construct($value);
    }
}

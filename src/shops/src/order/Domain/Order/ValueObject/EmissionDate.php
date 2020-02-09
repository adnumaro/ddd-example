<?php

namespace Shops\Order\Domain\Order\ValueObject;

use Carbon\Carbon;
use DateTime;
use InvalidArgumentException;
use Shared\Domain\ValueObject\DateValueObject;

final class EmissionDate extends DateValueObject
{
    public function __construct(Carbon $value)
    {
        $now = Carbon::now();

        if ($now->diffInDays($value) > 0) {
            throw new InvalidArgumentException('The order cannot be less than today');
        }

        parent::__construct($value);
    }
}
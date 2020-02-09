<?php

namespace Tests\Shops\Order\Domain\Order\ValueObject;

use Carbon\Carbon;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;

final class EmissionDateMother
{
    public static function create(Carbon $value): EmissionDate
    {
        return new EmissionDate($value);
    }

    public static function now(): EmissionDate
    {
        return new EmissionDate(Carbon::now());
    }
}
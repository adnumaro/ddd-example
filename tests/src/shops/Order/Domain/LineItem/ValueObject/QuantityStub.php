<?php

namespace Tests\shops\Order\Domain\LineItem\ValueObject;

use Shops\Order\Domain\LineItem\ValueObject\Quantity;

class QuantityStub
{
    public static function create(string $value): Quantity
    {
        return new Quantity($value);
    }

    public static function random(): Quantity
    {
        return self::create(rand(1, 10));
    }
}

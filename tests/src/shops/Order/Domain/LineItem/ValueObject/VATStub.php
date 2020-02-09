<?php

namespace Tests\shops\Order\Domain\LineItem\ValueObject;

use Shops\Order\Domain\LineItem\ValueObject\VAT;

class VATStub
{
    public static function create(string $value): VAT
    {
        return new VAT($value);
    }

    public static function random(): VAT
    {
        return self::create(array_rand([0.21]));
    }
}
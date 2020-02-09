<?php

namespace Tests\shops\Order\Domain\LineItem\ValueObject;

use Shops\Order\Domain\LineItem\ValueObject\Price;

class PriceStub
{
    public static function create(float $value) : Price
    {
        return new Price($value);
    }

    public static function random() : Price
    {
        return self::create(self::rand_float(1, 5));
    }

    private static function rand_float($st_num = 0, $end_num = 1, $mul = 1000000)
    {
        if ($st_num > $end_num) {
            return false;
        }

        return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
    }
}
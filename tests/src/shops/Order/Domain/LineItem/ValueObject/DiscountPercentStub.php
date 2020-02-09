<?php

namespace Tests\shops\Order\Domain\LineItem\ValueObject;

use Shops\Order\Domain\LineItem\ValueObject\DiscountPercent;

class DiscountPercentStub
{
    public static function create(float $value) : DiscountPercent
    {
        return new DiscountPercent($value);
    }

    public static function random() : DiscountPercent
    {
        return self::create(self::rand_float(0.01, 0.9));
    }

    private static function rand_float($st_num = 0, $end_num = 1, $mul = 1000000)
    {
        if ($st_num > $end_num) {
            return false;
        }

        return mt_rand($st_num * $mul, $end_num * $mul) / $mul;
    }
}

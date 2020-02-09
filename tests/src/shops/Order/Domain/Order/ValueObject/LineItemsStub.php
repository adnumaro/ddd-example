<?php

namespace Tests\Shops\Order\Domain\Order\ValueObject;

use Shops\Order\Domain\Order\ValueObject\LineItems;
use Tests\Shops\Order\Domain\LineItem\LineItemStub;

final class LineItemsStub
{
    public static function create(array $items) : LineItems
    {
        return new LineItems($items);
    }

    public static function randomExact(int $count = 1, array $options = []) : LineItems
    {
        $items = [];

        for ($i = 0; $i < $count; $i++) {
            array_push($items, LineItemStub::randomWithExact($options));
        }

        return self::create($items);
    }
}

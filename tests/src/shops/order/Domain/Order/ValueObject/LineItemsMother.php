<?php

namespace Tests\Shops\Order\Domain\Order\ValueObject;

use Shops\Order\Domain\LineItem\LineItem;
use Shops\Order\Domain\LineItem\ValueObject\Id;
use Shops\Order\Domain\LineItem\ValueObject\Price;
use Shops\Order\Domain\LineItem\ValueObject\ProductName;
use Shops\Order\Domain\LineItem\ValueObject\Quantity;
use Shops\Order\Domain\LineItem\ValueObject\VAT;
use Shops\Order\Domain\Order\ValueObject\LineItems;
use Tests\Shared\Domain\MotherCreator;

final class LineItemsMother
{
    public static function randomExact(int $count, float $quantity, float $price, array $vat) : LineItems
    {
        $items = [];

        for ($i = 0; $i < $count; $i++) {
            array_push(
                $items,
                new LineItem(
                    new Id($i + 1),
                    new ProductName(MotherCreator::fake()->name),
                    new Quantity($quantity),
                    new Price($price),
                    new VAT($vat[$i])
                )
            );
        }

        return new LineItems($items);
    }
}

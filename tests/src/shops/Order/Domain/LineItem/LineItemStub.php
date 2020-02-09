<?php

namespace Tests\Shops\Order\Domain\LineItem;

use Shops\Order\Domain\LineItem\LineItem;
use Shops\Order\Domain\LineItem\ValueObject\DiscountPercent;
use Shops\Order\Domain\LineItem\ValueObject\Id;
use Shops\Order\Domain\LineItem\ValueObject\Price;
use Shops\Order\Domain\LineItem\ValueObject\ProductName;
use Shops\Order\Domain\LineItem\ValueObject\Quantity;
use Shops\Order\Domain\LineItem\ValueObject\VAT;
use Tests\shops\Order\Domain\LineItem\ValueObject\DiscountPercentStub;
use Tests\shops\Order\Domain\LineItem\ValueObject\IdStub;
use Tests\shops\Order\Domain\LineItem\ValueObject\PriceStub;
use Tests\shops\Order\Domain\LineItem\ValueObject\ProductNameStub;
use Tests\shops\Order\Domain\LineItem\ValueObject\QuantityStub;
use Tests\shops\Order\Domain\LineItem\ValueObject\VATStub;

final class LineItemStub
{
    public static function create(
        Id $id,
        ProductName $productName,
        Quantity $quantity,
        Price $price,
        DiscountPercent $discountPercent,
        VAT $vat
    ) : LineItem {
        return new LineItem(
            $id,
            $productName,
            $quantity,
            $price,
            $discountPercent,
            $vat
        );
    }

    public static function randomWithExact(array $options) : LineItem
    {
        $id          = $options['id'] ?? IdStub::random();
        $productName = $options['productName'] ?? ProductNameStub::random();
        $quantity    = $options['quantity'] ?? QuantityStub::random();
        $price       = $options['price'] ?? PriceStub::random();
        $discountPer = $options['discountPercent'] ?? DiscountPercentStub::random();
        $vat         = $options['vat'] ?? VATStub::random();

        return self::create(
            $id,
            $productName,
            $quantity,
            $price,
            $discountPer,
            $vat
        );
    }
}

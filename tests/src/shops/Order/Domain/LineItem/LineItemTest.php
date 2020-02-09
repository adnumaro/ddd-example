<?php

namespace Tests\Shops\Order\Domain\LineItem;

use PHPUnit\Framework\TestCase;
use Shops\Order\Domain\LineItem\Exception\LineItemQuantityLowerThanOneException;
use Shops\Order\Domain\LineItem\ValueObject\DiscountPercent;
use Shops\Order\Domain\LineItem\ValueObject\Price;
use Shops\Order\Domain\LineItem\ValueObject\Quantity;
use Shops\Order\Domain\LineItem\ValueObject\VAT;

final class LineItemTest extends TestCase
{
    /** @test */
    public function it_should_calculate_total_correctly() : void
    {
        $price           = 5;
        $quantity        = 3;
        $discountPercent = 0.5;
        $vat             = 0.21;

        $lineItem = LineItemStub::randomWithExact([
            'price'           => new Price($price),
            'quantity'        => new Quantity($quantity),
            'discountPercent' => new DiscountPercent($discountPercent),
            'vat'             => new VAT($vat),
        ]);

        $taxBase  = $price * $quantity;
        $discount = $taxBase * $discountPercent;
        $tax      = ($taxBase - $discount) * $vat;
        $total    = $taxBase + $tax;
        $lineItem->calculateTotal();

        $this->assertEquals($total, $lineItem->getTotal());
    }

    /** @test */
    public function it_should_throw_exception_when_quantity_is_lower_than_one() : void
    {
        $this->expectException(LineItemQuantityLowerThanOneException::class);

        LineItemStub::randomWithExact(['quantity' => new Quantity(0)]);
    }
}

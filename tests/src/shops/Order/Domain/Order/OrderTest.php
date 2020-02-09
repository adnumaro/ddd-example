<?php

namespace Tests\Shops\Order\Domain\Order;

use Carbon\Carbon;
use PHPUnit\Framework\TestCase;
use Shops\Order\Domain\LineItem\ValueObject\DiscountPercent;
use Shops\Order\Domain\LineItem\ValueObject\Price;
use Shops\Order\Domain\LineItem\ValueObject\Quantity;
use Shops\Order\Domain\LineItem\ValueObject\VAT;
use Shops\Order\Domain\Order\Exception\OrderEmissionDateLowerThanTodayException;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;
use Tests\Shops\Order\Domain\Order\ValueObject\LineItemsStub;

final class OrderTest extends TestCase
{
    /** @test */
    public function it_should_apply_15_percent_of_discount_to_each_line_item_when_total_is_greater_than_20() : void
    {
        $quantity        = 1;
        $price           = 10;
        $vat             = 0.21;
        $discountPercent = 0.15;

        $order = OrderStub::randomWithExact([
            'lineItems' => LineItemsStub::randomExact(2, [
                'quantity'        => new Quantity($quantity),
                'price'           => new Price($price),
                'discountPercent' => new DiscountPercent(0),
                'vat'             => new VAT($vat),
            ]),
        ]);

        $taxBase  = $price * $quantity;
        $discount = $taxBase * $discountPercent;

        $this->assertEquals($discount * 2, $order->getDiscount());
    }

    /** @test */
    public function it_should_apply_8_percent_of_discount_to_each_line_item_when_total_is_greater_than_10() : void
    {
        $quantity        = 1;
        $price           = 5;
        $vat             = 0.21;
        $discountPercent = 0.08;

        $order = OrderStub::randomWithExact([
            'lineItems' => LineItemsStub::randomExact(2, [
                'quantity'        => new Quantity($quantity),
                'price'           => new Price($price),
                'discountPercent' => new DiscountPercent(0),
                'vat'             => new VAT($vat),
            ]),
        ]);

        $taxBase  = $price * $quantity;
        $discount = $taxBase * $discountPercent;

        $this->assertEquals($discount * 2, $order->getDiscount());
    }

    /** @test */
    public function it_should_not_apply_discount_when_total_is_lower_than_10() : void
    {
        $quantity        = 1;
        $price           = 2;
        $vat             = 0.21;

        $order = OrderStub::randomWithExact([
            'lineItems' => LineItemsStub::randomExact(2, [
                'quantity'        => new Quantity($quantity),
                'price'           => new Price($price),
                'discountPercent' => new DiscountPercent(0),
                'vat'             => new VAT($vat),
            ]),
        ]);

        $this->assertEquals(0, $order->getDiscount());
    }

    /** @test */
    public function it_should_throw_exception_when_emission_date_is_lower_than_today() : void
    {
        $this->expectException(OrderEmissionDateLowerThanTodayException::class);

        OrderStub::randomWithExact(['emissionDate' => new EmissionDate(Carbon::now()->subDay())]);
    }
}

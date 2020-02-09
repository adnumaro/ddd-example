<?php

namespace Tests\Shops\Application\Insert;

use PHPUnit\Framework\TestCase;
use Tests\Shops\Order\Domain\Order\OrderMother;

final class OrderInsertTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
    }

    /** @test */
    public function it_has_correct_tax_base() : void
    {
        $count    = 3;
        $price    = 1.5;
        $quantity = 2;
        $order    = OrderMother::randomWithExactLineItems([
            'count'    => $count,
            'price'    => $price,
            'quantity' => $quantity,
        ]);

        $taxBaseExpected = ($price * $quantity) * $count;
        $taxBase         = $order->getTaxBase();

        $this->assertEquals($taxBaseExpected, $taxBase);
    }

    /** @test */
    public function it_has_correct_discount() : void
    {
        $count    = 3;
        $price    = 1.5;
        $quantity = 2;
        $vat      = 0.21;
        $order    = OrderMother::randomWithExactLineItems([
            'count'    => $count,
            'price'    => $price,
            'quantity' => $quantity,
            'vat'      => $vat,
        ]);

        $taxBase          = $price * $quantity;
        $discountExpected = ($taxBase * $order->getDiscountPercentApplied()) * $count;

        $discount = $order->getDiscount();

        $this->assertEquals($discountExpected, $discount);
    }

    /** @test */
    public function it_has_correct_tax() : void
    {
        $count    = 3;
        $price    = 1.5;
        $quantity = 2;
        $vat      = 0.21;
        $order    = OrderMother::randomWithExactLineItems([
            'count'    => $count,
            'price'    => $price,
            'quantity' => $quantity,
            'vat'      => $vat,
        ]);

        $taxBase     = $price * $quantity;
        $discount    = $taxBase * $order->getDiscountPercentApplied();
        $taxExpected = (($taxBase - $discount) * $vat) * count($order->getLineItems());

        $tax = $order->getTax();

        $this->assertEquals($taxExpected, $tax);
    }

    /** @test */
    public function it_has_correct_total() : void
    {
        $count    = 3;
        $price    = 1.5;
        $quantity = 2;
        $vat      = 0.21;
        $order    = OrderMother::randomWithExactLineItems([
            'count'    => $count,
            'price'    => $price,
            'quantity' => $quantity,
            'vat'      => $vat,
        ]);

        $taxBase       = $price * $quantity;
        $discount      = $taxBase * $order->getDiscountPercentApplied();
        $tax           = ($taxBase - $discount) * $vat;
        $totalExpected = ($taxBase + $tax) * count($order->getLineItems());

        $total = $order->getTotal();

        $this->assertEquals($totalExpected, $total);
    }
}

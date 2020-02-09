<?php

namespace Tests\Shops\Order\Domain\Order;

use PHPUnit\Framework\TestCase;
use Shops\Order\Domain\OrderTransformer;

final class OrderTransformerTest extends TestCase
{
    /** @test */
    public function it_should_has_correct_keys() : void
    {
        $order = OrderStub::randomWithExact();

        $expected = [
            'date'               => $order->getEmissionDate(),
            'reference'          => $order->getReference(),
            'discountPercentage' => $order->getDiscountPercent(),
            'discountAmount'     => $order->getDiscount(),
            'tax'                => $order->getTax(),
            'total'              => $order->getTotal(),
            'numberOfItems'      => $order->getLineItemsCount(),
        ];

        $transformer = new OrderTransformer([$order]);

        $this->assertEquals($expected, $transformer->transform()[0]);
    }
}
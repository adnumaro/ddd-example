<?php

namespace Shops\Order\Domain;

final class OrderTransformer
{
    private $orders;

    public function __construct(array $orders)
    {
        $this->orders = new Orders($orders);
    }

    public function transform() : array
    {
        $items = [];

        foreach ($this->orders as $order) {
            array_push($items, [
                'date'               => $order->getEmissionDate(),
                'reference'          => $order->getReference(),
                'discountPercentage' => $order->getDiscountPercent(),
                'discountAmount'     => $order->getDiscount(),
                'tax'                => $order->getTax(),
                'total'              => $order->getTotal(),
                'numberOfItems'      => $order->getLineItemsCount(),
            ]);
        }

        return $items;
    }
}

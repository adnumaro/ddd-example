<?php

namespace Tests\Shops\Order\Domain\Order;

use Shops\Order\Domain\Order\Order;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;
use Shops\Order\Domain\Order\ValueObject\Id;
use Shops\Order\Domain\Order\ValueObject\LineItems;
use Shops\Order\Domain\Order\ValueObject\Observations;
use Shops\Order\Domain\Order\ValueObject\Reference;

use Tests\Shops\Order\Domain\Order\ValueObject\EmissionDateMother;
use Tests\Shops\Order\Domain\Order\ValueObject\LineItemsMother;
use Tests\Shops\Order\Domain\Order\ValueObject\ObservationsMother;
use Tests\Shops\Order\Domain\Order\ValueObject\ReferenceMother;

final class OrderMother
{
    public static function create(
        Id $id,
        Reference $reference,
        EmissionDate $emissionDate,
        Observations $observations,
        LineItems $lineItems
    ) : Order {
        return new Order(
            $id,
            $reference,
            $emissionDate,
            $observations,
            $lineItems
        );
    }

    public static function randomWithExactLineItems(array $options) : Order
    {
        $count    = isset($options['count']) ? $options['count'] : 2;
        $quantity = isset($options['quantity']) ? $options['quantity'] : 2;
        $price    = isset($options['price']) ? $options['price'] : 1.5;
        $vat      = isset($options['vat']) ? $options['vat'] : 0.21;

        return self::create(
            new Id(1),
            ReferenceMother::random(),
            EmissionDateMother::now(),
            ObservationsMother::random(),
            LineItemsMother::randomExact($count, $quantity, $price, array_fill(0, $count, $vat))
        );
    }
}

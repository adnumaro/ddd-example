<?php

namespace Tests\Shops\Order\Domain\Order;

use Shops\Order\Domain\Order\Order;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;
use Shops\Order\Domain\Order\ValueObject\LineItems;
use Shops\Order\Domain\Order\ValueObject\Observations;
use Shops\Order\Domain\Order\ValueObject\Reference;
use Tests\Shops\Order\Domain\Order\ValueObject\EmissionDateStub;
use Tests\Shops\Order\Domain\Order\ValueObject\LineItemsStub;
use Tests\Shops\Order\Domain\Order\ValueObject\ObservationsStub;
use Tests\Shops\Order\Domain\Order\ValueObject\ReferenceStub;

final class OrderStub
{
    public static function create(
        Reference $reference,
        EmissionDate $emissionDate,
        Observations $observations,
        LineItems $lineItems
    ) : Order {
        return new Order(
            $reference,
            $emissionDate,
            $observations,
            $lineItems
        );
    }

    public static function randomWithExact(array $options = []) : Order
    {
        $reference    = $options['reference'] ?? ReferenceStub::random();
        $emissionDate = $options['emissionDate'] ?? EmissionDateStub::now();
        $observations = $options['observations'] ?? ObservationsStub::random();
        $lineItems    = $options['lineItems'] ?? LineItemsStub::randomExact();

        return self::create(
            $reference,
            $emissionDate,
            $observations,
            $lineItems
        );
    }
}

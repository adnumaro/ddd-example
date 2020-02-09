<?php

namespace Shops\Order\Application\Insert;

use Shops\Order\Application\OrderUseCases;
use Shops\Order\Domain\Order\Exception\OrderReferenceAlreadyExistsException;
use Shops\Order\Domain\Order\Order;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;
use Shops\Order\Domain\Order\ValueObject\Id;
use Shops\Order\Domain\Order\ValueObject\LineItems;
use Shops\Order\Domain\Order\ValueObject\Observations;
use Shops\Order\Domain\Order\ValueObject\Reference;

final class OrderInsert extends OrderUseCases
{
    public function __invoke(
        Reference $reference,
        EmissionDate $emissionDate,
        Observations $observations,
        LineItems $lineItems
    ) {
        $order = new Order(
            $reference,
            $emissionDate,
            $observations,
            $lineItems
        );

        if ($this->repository->exist($reference)) {
             throw new OrderReferenceAlreadyExistsException($reference);
        }

        $this->repository->insert($order);
    }
}

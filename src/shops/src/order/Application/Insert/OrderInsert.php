<?php

namespace Shops\Order\Application\Insert;

use Shops\Order\Application\OrderUseCases;
use Shops\Order\Domain\Order\Order;
use Shops\Order\Domain\Order\ValueObject\Discount;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;
use Shops\Order\Domain\Order\ValueObject\Id;
use Shops\Order\Domain\Order\ValueObject\LineItems;
use Shops\Order\Domain\Order\ValueObject\Observations;
use Shops\Order\Domain\Order\ValueObject\Reference;
use Shops\Order\Domain\Order\ValueObject\Tax;
use Shops\Order\Domain\Order\ValueObject\TaxBase;
use Shops\Order\Domain\Order\ValueObject\Total;

final class OrderInsert extends OrderUseCases
{
    public function __invoke(
        Id $id,
        Reference $reference,
        EmissionDate $emissionDate,
        Discount $discount,
        Tax $tax,
        TaxBase $taxBase,
        Observations $observations,
        Total $total,
        LineItems $invoices
    ) {
        $OrderOrder = new Order(
            $id,
            $reference,
            $emissionDate,
            $discount,
            $tax,
            $taxBase,
            $observations,
            $total,
            $invoices
        );

        $this->repository->insert($OrderOrder);
    }
}

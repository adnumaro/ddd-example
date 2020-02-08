<?php

namespace PurchaseTest\Shops\Purchase\Application\Insert;

use PurchaseTest\Shops\Purchase\Application\OrderUseCases;
use PurchaseTest\Shops\Purchase\Domain\Order\Order;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Discount;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\EmissionDate;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Id;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\LineItems;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Observations;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Reference;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Tax;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\TaxBase;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Total;

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
        $purchaseOrder = new Order(
            $reference,
            $emissionDate,
            $discount,
            $tax,
            $taxBase,
            $observations,
            $total,
            $invoices
        );

        $this->repository->insert($purchaseOrder);
    }
}

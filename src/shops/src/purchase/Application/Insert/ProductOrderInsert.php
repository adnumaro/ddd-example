<?php

namespace PurchaseTest\Shops\Purchase\Application\Insert;

use PurchaseTest\Shops\Purchase\Application\PurchaseOrderUseCases;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\Order;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Discount;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\EmissionDate;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\LineItems;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Observations;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Reference;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Tax;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\TaxBase;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Total;

final class ProductOrderInsert extends PurchaseOrderUseCases
{
    public function __invoke(
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

<?php

namespace PurchaseTest\Shops\Purchase\Domain\PurchaseOrder;

use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Invoices;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Reference;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\TaxBase;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Discount;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\EmissionDate;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Observations;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Tax;
use PurchaseTest\Shops\Purchase\Domain\PurchaseOrder\ValueObject\Total;

class PurchaseOrder
{
    /**
     * @var Reference
     */
    private $reference;

    /**
     * @var EmissionDate
     */
    private $emissionDate;

    /**
     * @var Discount
     */
    private $discount;

    /**
     * @var Tax
     */
    private $tax;

    /**
     * @var TaxBase
     */
    private $taxBase;

    /**
     * @var Observations
     */
    private $observations;

    /**
     * @var Total
     */
    private $total;

    /**
     * @var Invoices
     */
    private $invoices;

    public function __construct(
        Reference $reference,
        EmissionDate $emissionDate,
        Discount $discount,
        Tax $tax,
        TaxBase $taxBase,
        Observations $observations,
        Total $total,
        Invoices $invoices
    ) {
        $this->reference    = $reference;
        $this->emissionDate = $emissionDate;
        $this->discount     = $discount;
        $this->tax          = $tax;
        $this->taxBase      = $taxBase;
        $this->observations = $observations;
        $this->total        = $total;
        $this->invoices     = $invoices;
    }

    /**
     * @return Reference
     */
    public function getReference() : Reference
    {
        return $this->reference;
    }

    /**
     * @return EmissionDate
     */
    public function getEmissionDate() : EmissionDate
    {
        return $this->emissionDate;
    }

    /**
     * @return Discount
     */
    public function getDiscount() : Discount
    {
        return $this->discount;
    }

    /**
     * @return Tax
     */
    public function getTax() : Tax
    {
        return $this->tax;
    }

    /**
     * @return TaxBase
     */
    public function getTaxBase() : TaxBase
    {
        return $this->taxBase;
    }

    /**
     * @return Observations
     */
    public function getObservations() : Observations
    {
        return $this->observations;
    }

    /**
     * @return Total
     */
    public function getTotal() : Total
    {
        return $this->total;
    }

    /**
     * @return Invoices
     */
    public function getInvoices() : Invoices
    {
        return $this->invoices;
    }
}
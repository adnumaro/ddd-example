<?php

namespace PurchaseTest\Shops\Purchase\Domain\Order;

use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\LineItems;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Reference;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\TaxBase;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Discount;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\EmissionDate;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Observations;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Tax;
use PurchaseTest\Shops\Purchase\Domain\Order\ValueObject\Total;

class Order
{
    /**
     * @var Id
     */
    private $id;

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
     * @var LineItems
     */
    private $lineItems;

    public function __construct(
        Reference $reference,
        EmissionDate $emissionDate,
        Discount $discount,
        Tax $tax,
        TaxBase $taxBase,
        Observations $observations,
        Total $total,
        LineItems $lineItems
    ) {
        $this->reference    = $reference;
        $this->emissionDate = $emissionDate;
        $this->discount     = $discount;
        $this->tax          = $tax;
        $this->taxBase      = $taxBase;
        $this->observations = $observations;
        $this->total        = $total;
        $this->lineItems    = $lineItems;
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
     * @return LineItems
     */
    public function getLineItems() : LineItems
    {
        return $this->lineItems;
    }
}
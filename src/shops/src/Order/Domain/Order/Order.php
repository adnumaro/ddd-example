<?php

namespace Shops\Order\Domain\Order;

use Shops\Order\Domain\LineItem\LineItem;
use Shops\Order\Domain\LineItem\ValueObject\DiscountPercent;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;
use Shops\Order\Domain\Order\ValueObject\LineItems;
use Shops\Order\Domain\Order\ValueObject\Observations;
use Shops\Order\Domain\Order\ValueObject\Reference;

class Order
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
     * @var Observations|null
     */
    private $observations;

    /**
     * @var LineItems
     */
    private $lineItems;

    /**
     * @var float
     */
    private $discount;

    /**
     * @var DiscountPercent
     */
    private $discountPercent;

    /**
     * @var float
     */
    private $total;

    public function __construct(
        Reference $reference,
        EmissionDate $emissionDate,
        ?Observations $observations,
        LineItems $lineItems
    ) {
        $this->reference    = $reference;
        $this->emissionDate = $emissionDate;
        $this->observations = $observations;
        $this->lineItems    = $lineItems;
        $this->discount     = 0;

        $this->calculateTotal();
        $this->calculateDiscount();
        $this->calculateTotal();
    }

    /**
     * @return EmissionDate
     */
    public function getEmissionDate() : EmissionDate
    {
        return $this->emissionDate;
    }

    /**
     * @return Reference
     */
    public function getReference() : Reference
    {
        return $this->reference;
    }

    /**
     * @return Observations|null
     */
    public function getObservations() : ?Observations
    {
        return $this->observations;
    }

    /**
     * @return float
     */
    public function getTaxBase() : float
    {
        $taxBase = 0;

        foreach ($this->lineItems as $lineItem) {
            $taxBase += $lineItem->getTaxBase();
        }

        return $taxBase;
    }

    /**
     * @return float
     */
    public function getDiscount() : float
    {
        $discount = 0;

        foreach ($this->lineItems as $lineItem) {
            $discount += $lineItem->getDiscount();
        }

        return $discount;
    }

    /**
     * @return float
     */
    public function getTax() : float
    {
        $tax = 0;

        foreach ($this->lineItems as $lineItem) {
            $tax += $lineItem->getTax();
        }

        return $tax;
    }

    /**
     * @return float
     */
    public function getTotal() : float
    {
        return $this->total;
    }

    public function getDiscountPercent() : float
    {
        return $this->discountPercent->value();
    }

    /**
     * @return int
     */
    public function getLineItemsCount() : int
    {
        return count($this->lineItems);
    }

    public function addLineItem(LineItem $lineItem)
    {
        $this->lineItems->add($lineItem);

        $this->calculateTotal();
        $this->calculateDiscount();
        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->total = 0;

        foreach ($this->lineItems as $lineItem) {
            $this->total += $lineItem->getTotal();
        }
    }

    public function calculateDiscount()
    {
        if ($this->total > 20) {
            $this->discountPercent = new DiscountPercent(0.15);
        } else if ($this->total > 10) {
            $this->discountPercent = new DiscountPercent(0.08);
        }

        $this->applyDiscountToEachItem($this->discountPercent);
    }

    private function applyDiscountToEachItem(DiscountPercent $discountPercent)
    {
        $this->total    = 0;
        $this->discount = 0;

        foreach ($this->lineItems as $lineItem) {
            $lineItem->applyDiscountPercent($discountPercent);

            $this->discount += $lineItem->getDiscount();
            $this->total    += $lineItem->getTotal();
        }
    }
}

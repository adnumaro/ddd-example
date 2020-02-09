<?php

namespace Shops\Order\Domain\Order;

use Shops\Order\Domain\Order\ValueObject\Id;
use Shops\Order\Domain\Order\ValueObject\LineItems;
use Shops\Order\Domain\Order\ValueObject\Reference;
use Shops\Order\Domain\Order\ValueObject\EmissionDate;
use Shops\Order\Domain\Order\ValueObject\Observations;

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
     * @var float
     */
    private $total;

    public function __construct(
        Id $id,
        Reference $reference,
        EmissionDate $emissionDate,
        ?Observations $observations,
        LineItems $lineItems
    ) {
        $this->id           = $id;
        $this->reference    = $reference;
        $this->emissionDate = $emissionDate;
        $this->observations = $observations;
        $this->lineItems    = $lineItems;
        $this->discount     = 0;

        $this->applyTotal();
    }

    /**
     * @return Id
     */
    public function getId() : Id
    {
        return $this->id;
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

    /**
     * @return LineItems
     */
    public function getLineItems() : LineItems
    {
        return $this->lineItems;
    }

    /**
     * @return float
     */
    public function getDiscountPercentApplied() : float
    {
        return $this->lineItems[0]->getDiscountPercent();
    }

    public function applyTotal()
    {
        $this->total = 0;

        foreach ($this->lineItems as $lineItem) {
            $this->total += $lineItem->getTotal();
        }

        $this->applyDiscount();
    }

    public function applyDiscount()
    {
        $total = $this->total;

        if ($total > 10) {
            $this->applyDiscountToItems(0.08);
        }

        if ($total > 20) {
            $this->applyDiscountToItems(0.15);
        }
    }

    private function applyDiscountToItems(float $discountPercent)
    {
        $this->total = 0;

        foreach ($this->lineItems as $lineItem) {
            $lineItem->setDiscountPercent($discountPercent);
            $this->discount += $lineItem->getDiscount();
            $this->total    += $lineItem->getTotal();
        }
    }
}

<?php

namespace Shops\Order\Domain\LineItem;

use Shops\Order\Domain\LineItem\ValueObject\DiscountPercent;
use Shops\Order\Domain\LineItem\ValueObject\Id;
use Shops\Order\Domain\LineItem\ValueObject\Price;
use Shops\Order\Domain\LineItem\ValueObject\ProductName;
use Shops\Order\Domain\LineItem\ValueObject\Quantity;
use Shops\Order\Domain\LineItem\ValueObject\VAT;

final class LineItem
{
    /**
     * @var Id
     */
    private $id;

    /**
     * @var ProductName
     */
    private $productName;

    /**
     * @var Quantity
     */
    private $quantity;

    /**
     * @var Price
     */
    private $price;

    /**
     * @var float
     */
    private $taxBase;

    /**
     * @var float
     */
    private $discountPercent;

    /**
     * @var float
     */
    private $discount;

    /**
     * @var VAT
     */
    private $vat;

    /**
     * @var float
     */
    private $tax;

    /**
     * @var float
     */
    private $total;

    public function __construct(
        Id $id,
        ProductName $productName,
        Quantity $quantity,
        Price $price,
        DiscountPercent $discountPercent,
        VAT $vat
    ) {
        $this->id              = $id;
        $this->productName     = $productName;
        $this->quantity        = $quantity;
        $this->price           = $price;
        $this->discountPercent = $discountPercent;
        $this->vat             = $vat;

        $this->calculateTotal();
    }

    /**
     * @return Id
     */
    public function getId() : Id
    {
        return $this->id;
    }

    /**
     * @return ProductName
     */
    public function getProductName() : ProductName
    {
        return $this->productName;
    }

    /**
     * @return Quantity
     */
    public function getQuantity() : Quantity
    {
        return $this->quantity;
    }

    /**
     * @return Price
     */
    public function getPrice() : Price
    {
        return $this->price;
    }

    /**
     * @return float
     */
    public function getTaxBase() : float
    {
        return $this->taxBase;
    }

    /**
     * @return float
     */
    public function getDiscountPercent() : float
    {
        return $this->discountPercent;
    }

    /**
     * @return float
     */
    public function getDiscount() : float
    {
        return $this->discount;
    }

    /**
     * @return float
     */
    public function getTax() : float
    {
        return $this->tax;
    }

    /**
     * @return float
     */
    public function getTotal() : float
    {
        return $this->total;
    }

    public function calculateTotal() : void
    {
        $this->calculateTaxBase();
        $this->calculateDiscount();
        $this->calculateTax();

        $this->total = $this->taxBase + $this->tax;
    }

    public function calculateTaxBase() : void
    {
        $this->taxBase = $this->price->value() * $this->quantity->value();
    }

    public function calculateDiscount() : void
    {
        $this->discount = $this->taxBase * $this->discountPercent->value();
    }

    public function calculateTax() : void
    {
        $this->tax = ($this->taxBase - $this->discount) * $this->vat->value();
    }

    public function applyDiscountPercent(DiscountPercent $discountPercent)
    {
        $this->discountPercent = $discountPercent;

        $this->calculateTotal();
    }
}

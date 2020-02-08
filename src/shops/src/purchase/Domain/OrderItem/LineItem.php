<?php

namespace PurchaseTest\Shops\Purchase\Domain\OrderItem;

use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\Amount;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\Discount;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\DiscountPercent;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\Id;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\Price;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\ProductName;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\Tax;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\TaxBase;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\Total;
use PurchaseTest\Shops\Purchase\Domain\OrderItem\ValueObject\VAT;

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
     * @var Amount
     */
    private $amount;

    /**
     * @var Price
     */
    private $price;

    /**
     * @var Discount
     */
    private $discount;

    /**
     * @var DiscountPercent
     */
    private $discountPercent;

    /**
     * @var Tax
     */
    private $tax;

    /**
     * @var TaxBase
     */
    private $taxBase;

    /**
     * @var VAT
     */
    private $vat;

    /**
     * @var Total
     */
    private $total;

    public function __construct(
        Id $id,
        ProductName $productName,
        Amount $amount,
        Price $price,
        Discount $discount,
        DiscountPercent $discountPercent,
        Tax $tax,
        TaxBase $taxBase,
        VAT $vat,
        Total $total
    ) {
        $this->id              = $id;
        $this->productName     = $productName;
        $this->amount          = $amount;
        $this->price           = $price;
        $this->discount        = $discount;
        $this->tax             = $tax;
        $this->taxBase         = $taxBase;
        $this->discountPercent = $discountPercent;
        $this->vat             = $vat;
        $this->total           = $total;
    }

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
     * @return Amount
     */
    public function getAmount() : Amount
    {
        return $this->amount;
    }

    /**
     * @return Price
     */
    public function getPrice() : Price
    {
        return $this->price;
    }

    /**
     * @return Discount
     */
    public function getDiscount() : Discount
    {
        return $this->discount;
    }

    /**
     * @return DiscountPercent
     */
    public function getDiscountPercent() : DiscountPercent
    {
        return $this->discountPercent;
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
     * @return VAT
     */
    public function getVat() : VAT
    {
        return $this->vat;
    }

    /**
     * @return Total
     */
    public function getTotal() : Total
    {
        return $this->total;
    }
}
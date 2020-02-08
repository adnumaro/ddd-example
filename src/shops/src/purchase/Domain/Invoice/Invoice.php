<?php

namespace PurchaseTest\Shops\Purchase\Domain\Invoice;

use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\Amount;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\Discount;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\DiscountPercent;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\Price;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\ProductName;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\Tax;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\TaxBase;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\Total;
use PurchaseTest\Shops\Purchase\Domain\Invoice\ValueObject\VAT;

final class Invoice
{
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
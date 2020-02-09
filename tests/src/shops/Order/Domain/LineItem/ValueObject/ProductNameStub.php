<?php

namespace Tests\shops\Order\Domain\LineItem\ValueObject;

use Shops\Order\Domain\LineItem\ValueObject\ProductName;
use Tests\Shared\Domain\MotherCreator;

final class ProductNameStub
{
    public static function create(string $value): ProductName
    {
        return new ProductName($value);
    }

    public static function random(): ProductName
    {
        return self::create(MotherCreator::fake()->name);
    }
}
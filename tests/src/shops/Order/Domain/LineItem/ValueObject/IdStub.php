<?php

namespace Tests\shops\Order\Domain\LineItem\ValueObject;

use Shops\Order\Domain\LineItem\ValueObject\Id;
use Tests\Shared\Domain\MotherCreator;

class IdStub
{
    public static function create(string $value): Id
    {
        return new Id($value);
    }

    public static function random(): Id
    {
        return self::create(MotherCreator::fake()->unique()->randomDigit);
    }
}
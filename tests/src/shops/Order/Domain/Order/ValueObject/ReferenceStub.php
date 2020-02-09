<?php

namespace Tests\Shops\Order\Domain\Order\ValueObject;

use Shops\Order\Domain\Order\ValueObject\Reference;
use Tests\Shared\Domain\MotherCreator;

final class ReferenceStub
{
    public static function create(string $value) : Reference
    {
        return new Reference($value);
    }

    public static function random() : Reference
    {
        return self::create(MotherCreator::fake()->regexify('[A-Za-z0-9]{20}'));
    }
}

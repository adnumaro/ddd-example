<?php

namespace Tests\Shops\Order\Domain\Order\ValueObject;

use Shops\Order\Domain\Order\ValueObject\Reference;
use Tests\Shared\Domain\MotherCreator;

final class ReferenceMother
{
    public static function create(string $value): Reference
    {
        return new Reference($value);
    }

    public static function random(): Reference
    {
        return new Reference(MotherCreator::fake()->regexify('[A-Za-z0-9]{20}'));
    }
}

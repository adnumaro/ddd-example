<?php

namespace Tests\Shops\Order\Domain\Order\ValueObject;

use Shops\Order\Domain\Order\ValueObject\Observations;
use Tests\Shared\Domain\MotherCreator;

final class ObservationsMother
{
    public static function create(string $value): Observations
    {
        return new Observations($value);
    }

    public static function random(): Observations
    {
        return new Observations(MotherCreator::fake()->text($maxNbChars = 200));
    }
}

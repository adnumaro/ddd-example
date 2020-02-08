<?php

namespace PurchaseTest\Shared\Domain\ValueObject;

use DateTime;

abstract class DateValueObject
{
    /**
     * @var DateTime
     */
    protected $value;

    public function __construct(DateTime $value)
    {
        $this->value = $value;
    }

    /**
     * @return DateTime
     */
    public function value(): DateTime
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        return (string) $this->value();
    }
}
<?php

namespace PurchaseTest\Shared\Domain\ValueObject;

abstract class ArrayValueObject
{
    /**
     * @var array
     */
    protected $value;

    public function __construct(array $value)
    {
        $this->value = $value;
    }

    /**
     * @return array
     */
    public function value() : array
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return implode(', ', $this->value());
    }
}
<?php

namespace Shared\Domain\ValueObject;

abstract class StringValueObject
{
    /**
     * @var string
     */
    protected $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    /**
     * @return string
     */
    public function value() : string
    {
        return $this->value;
    }

    /**
     * @return string
     */
    public function __toString() : string
    {
        return $this->value();
    }
}
<?php

namespace Shared\Domain\ValueObject;

abstract class IntValueObject
{
    /**
     * @var int
     */
    protected $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    /**
     * @return int
     */
    public function value(): int
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
<?php

namespace Shops\Order\Domain\Order\Exception;

use RuntimeException;
use Shops\Order\Domain\Order\ValueObject\Reference;

final class OrderReferenceAlreadyExistsException extends RuntimeException
{
    public function __construct(Reference $reference) {
        parent::__construct('Order reference "' . $reference->value() . '" already exists');
    }
}
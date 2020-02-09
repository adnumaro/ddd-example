<?php

namespace Shops\Order\Application\GetAll;

use Shops\Order\Application\OrderUseCases;

final class OrderGetAll extends OrderUseCases
{
    public function __invoke()
    {
        return $this->repository->getAll();
    }
}
<?php

namespace Tests\Shops\Application\GetAll;

use PHPUnit\Framework\TestCase;
use Shops\Order\Application\GetAll\OrderGetAll;
use Shops\Order\Domain\OrderTransformer;
use Shops\Order\Infrastructure\Repository\InMemoryOrderRepository;
use Tests\Shops\Order\Domain\Order\OrderStub;

final class OrderGetAllTest extends TestCase
{
    /** @test */
    public function it_get_all_product_orders() : void
    {
        $order1 = OrderStub::randomWithExact();
        $order2 = OrderStub::randomWithExact();

        $repository = new InMemoryOrderRepository();
        $repository->insert($order1);
        $repository->insert($order2);

        $getAllUseCase = new OrderGetAll($repository);

        $result = $getAllUseCase();

        $this->assertEquals($order1, $result[0]);
        $this->assertEquals($order2, $result[1]);
    }
}

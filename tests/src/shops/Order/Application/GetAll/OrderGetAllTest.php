<?php

namespace Tests\Shops\Application\GetAll;

use PHPUnit\Framework\TestCase;
use Shops\Order\Application\GetAll\OrderGetAll;
use Shops\Order\Infrastructure\Repository\InMemoryOrderRepository;
use Tests\Shops\Order\Domain\Order\OrderStub;

final class OrderGetAllTest extends TestCase
{
    protected function setUp() : void
    {
        parent::setUp();
    }

    /** @test */
    public function it_get_all_product_orders() : void
    {
        $order1 = OrderStub::randomWithExactLineItems([]);
        $order2 = OrderStub::randomWithExactLineItems([]);

        $repository = new InMemoryOrderRepository();
        $repository->insert($order1);
        $repository->insert($order2);

        $useCase = new OrderGetAll($repository);

        $result = $useCase();

        $this->assertEquals($order1, $result[0]);
        $this->assertEquals($order2, $result[1]);
    }
}

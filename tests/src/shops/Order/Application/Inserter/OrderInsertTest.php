<?php

namespace Tests\Shops\Application\Insert;

use PHPUnit\Framework\TestCase;
use Shops\Order\Application\Insert\OrderInsert;
use Shops\Order\Domain\Order\Exception\OrderReferenceAlreadyExistsException;
use Shops\Order\Infrastructure\Repository\InMemoryOrderRepository;
use Tests\Shops\Order\Domain\Order\ValueObject\EmissionDateStub;
use Tests\Shops\Order\Domain\Order\ValueObject\LineItemsStub;
use Tests\Shops\Order\Domain\Order\ValueObject\ObservationsStub;
use Tests\Shops\Order\Domain\Order\ValueObject\ReferenceStub;

final class OrderInsertTest extends TestCase
{
    /** @test */
    public function it_insert_order()
    {
        $repository = new InMemoryOrderRepository();
        $useCase    = new OrderInsert($repository);

        $reference = ReferenceStub::random();

        $useCase(
            $reference,
            EmissionDateStub::now(),
            ObservationsStub::random(),
            LineItemsStub::randomExact(1)
        );

        $this->assertTrue($repository->exist($reference));
    }

    /** @test */
    public function it_should_throw_exception_if_reference_already_exists()
    {
        $repository    = new InMemoryOrderRepository();
        $insertUseCase = new OrderInsert($repository);

        $reference = ReferenceStub::random();

        $insertUseCase(
            $reference,
            EmissionDateStub::now(),
            ObservationsStub::random(),
            LineItemsStub::randomExact(1)
        );

        $this->expectException(OrderReferenceAlreadyExistsException::class);

        $insertUseCase(
            $reference,
            EmissionDateStub::now(),
            ObservationsStub::random(),
            LineItemsStub::randomExact(2)
        );
    }
}

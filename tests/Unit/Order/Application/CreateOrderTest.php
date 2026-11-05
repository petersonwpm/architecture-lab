<?php

declare(strict_types=1);

use Core\Modules\Customer\Domain\CustomerId;
use Core\Modules\Order\Application\CreateOrder;
use Core\Modules\Order\Application\CreateOrderInput;
use Core\Modules\Order\Application\OrderItemInput;
use Core\Modules\Order\Application\OrderItemsInput;
use Core\Modules\Order\Domain\OrderProductId;
use Core\Modules\Order\Domain\OrderQuantity;
use Core\Modules\Order\Domain\OrderId;
use PHPUnit\Framework\TestCase;

class CreateOrderTest extends TestCase
{
    public function testCanCreateAnOrder()
    {
        $orderItemsInput = new OrderItemsInput();
        $orderItemsInput
            ->add(
                new OrderItemInput(
                    productId: new OrderProductId('0cc25cb6-d61d-468f-ad06-2065086f3080'),
                    quantity:  new OrderQuantity(1)
                )
            )->add(
                new OrderItemInput(
                    productId: new OrderProductId('3d499c28-6900-45d1-9c5f-f15f191bfb0d'),
                    quantity: new OrderQuantity(2)
                )
            );

        $createOrderInput = new CreateOrderInput(
            customerId: new CustomerId('a085db9c-886c-4a88-9691-199f1981abbd'),
            products:  $orderItemsInput
        );

        $useCase = new CreateOrder();
        $orderId = $useCase->execute($createOrderInput);

        $this->assertInstanceOf(OrderId::class, $orderId);
    }
}

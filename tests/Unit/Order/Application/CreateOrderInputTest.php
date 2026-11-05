<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Order\Application;

use Core\Modules\Customer\Domain\CustomerId;
use Core\Modules\Order\Application\CreateOrderInput;
use Core\Modules\Order\Application\OrderItemInput;
use Core\Modules\Order\Application\OrderItemsInput;
use Core\Modules\Order\Domain\OrderProductId;
use Core\Modules\Order\Domain\OrderQuantity;
use PHPUnit\Framework\TestCase;

final class CreateOrderInputTest extends TestCase
{
    public function testExposesCustomerAndOrderItems(): void
    {
        $items = new OrderItemsInput();
        $items->add(new OrderItemInput(new OrderProductId('product-1'), new OrderQuantity(2)));
        $input = new CreateOrderInput(new CustomerId('customer-1'), $items);

        $this->assertSame('customer-1', $input->getCustomerId()->getValue());
        $this->assertSame($items, $input->getProducts());
    }
}

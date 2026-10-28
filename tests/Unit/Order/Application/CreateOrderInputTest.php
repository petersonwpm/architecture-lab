<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Order\Application;

use Core\Modules\Order\Application\CreateOrderInput;
use Core\Modules\Order\Application\OrderItemInput;
use Core\Modules\Order\Application\OrderItemsInput;
use PHPUnit\Framework\TestCase;

final class CreateOrderInputTest extends TestCase
{
    public function testExposesCustomerAndOrderItems(): void
    {
        $items = new OrderItemsInput();
        $items->add(new OrderItemInput('product-1', 2));
        $input = new CreateOrderInput('customer-1', $items);

        $this->assertSame('customer-1', $input->getCustomerId());
        $this->assertSame($items, $input->getProducts());
        $this->assertSame(2, $input->getProducts()->get('product-1')?->getQuantity());
    }
}

<?php

namespace Core\Modules\Order\Application;

final class CreateOrderInput
{
    public function __construct(
        private readonly string $customerId,
        private readonly OrderItemsInput $products
    ) {
    }

    public function getCustomerId(): string
    {
        return $this->customerId;
    }

    public function getProducts(): OrderItemsInput
    {
        return $this->products;
    }
}

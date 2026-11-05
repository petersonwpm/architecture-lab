<?php

namespace Core\Modules\Order\Application;

use Core\Modules\Customer\Domain\CustomerId;

final class CreateOrderInput
{
    public function __construct(
        private readonly CustomerId $customerId,
        private readonly OrderItemsInput $products
    ) {
    }

    public function getCustomerId(): CustomerId
    {
        return $this->customerId;
    }

    public function getProducts(): OrderItemsInput
    {
        return $this->products;
    }
}

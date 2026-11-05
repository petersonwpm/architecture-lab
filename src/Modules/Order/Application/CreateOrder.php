<?php

namespace Core\Modules\Order\Application;

use Core\Modules\Order\Domain\OrderId;

final class CreateOrder implements CreateOrderInputBoundary
{
    public function execute(CreateOrderInput $input): OrderId
    {
        return new OrderId(1);
    }
}

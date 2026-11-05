<?php

declare(strict_types=1);

namespace Core\Modules\Order\Application;

use Core\Modules\Order\Domain\OrderId;

interface CreateOrderInputBoundary
{
    public function execute(CreateOrderInput $input): OrderId;
}

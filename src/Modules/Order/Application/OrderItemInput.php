<?php

declare(strict_types=1);

namespace Core\Modules\Order\Application;

use Core\Modules\Order\Domain\OrderProductId;
use Core\Modules\Order\Domain\OrderQuantity;

final class OrderItemInput
{
    public function __construct(
        private readonly OrderProductId $productId,
        private readonly OrderQuantity $quantity
    ) {
    }

    public function getProductId(): OrderProductId
    {
        return $this->productId;
    }

    public function getQuantity(): OrderQuantity
    {
        return $this->quantity;
    }
}

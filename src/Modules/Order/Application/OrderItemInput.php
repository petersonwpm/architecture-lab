<?php

namespace Core\Modules\Order\Application;

final class OrderItemInput
{
    public function __construct(
        private readonly string $id,
        private readonly int $quantity
    ) {
    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getQuantity(): int
    {
        return $this->quantity;
    }
}

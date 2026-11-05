<?php

namespace Core\Modules\Order\Domain;

final class OrderProductId
{
    public function __construct(private readonly string $productId)
    {
    }

    public function value(): string
    {
        return $this->productId;
    }
}

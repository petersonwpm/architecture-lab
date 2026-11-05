<?php

namespace Core\Modules\Order\Domain;

use DomainException;

final class OrderQuantity
{
    public function __construct(
        private readonly int $value,
    ) {
        if ($value < 1) {
            throw new DomainException("The quantity must be greather than 0");
        }
    }

    public function value(): int
    {
        return $this->value;
    }
}

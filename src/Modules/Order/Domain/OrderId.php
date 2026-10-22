<?php
namespace App\Modules\Order\Domain;

use InvalidArgumentException;

final class OrderId
{
    public function __construct(private readonly string $value)
    {
        if (empty($value)) {
            throw new InvalidArgumentException("The value can not be empty");
        }
    }

    public function value(): string
    {
        return $this->value;
    }

    public function __toString()
    {
        return $this->value;
    }
}

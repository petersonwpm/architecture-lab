<?php

declare(strict_types=1);

namespace Core\Modules\Customer\Domain;

final class CustomerId
{
    public function __construct(private readonly string $value)
    {
    }

    public function __toString()
    {
        return $this->getValue();
    }

    public function getValue(): string
    {
        return $this->value;
    }
}

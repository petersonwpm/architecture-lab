<?php
namespace Core\Modules\Customer\Domain;

use DomainException;

class Name
{
    public function __construct(private string $name)
    {
        if (empty($name)) {
            throw new DomainException('Name can not be empty');
        }
    }

    public function __toString()
    {
        return $this->name;
    }
}

<?php
namespace Core\Modules\Customer\Domain;

use DomainException;

class Email
{
    private string $email;

    public function __construct(string $value)
    {
        if (!$this->isValid($value)) {
            throw new DomainException("The email is not valid");
        }

        $this->email = $value;

    }

    private function isValid(string $value)
    {
        return str_contains('@', $value);
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

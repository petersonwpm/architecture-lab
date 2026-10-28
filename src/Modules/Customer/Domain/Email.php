<?php

namespace Core\Modules\Customer\Domain;

use InvalidArgumentException;

class Email
{
    private string $email;

    public function __construct(string $email)
    {
        if (!$this->isValid($email)) {
            throw new InvalidArgumentException(sprintf('"%s" is not a valid email address', $email));
        }

        $this->email = $email;
    }

    private function isValid(string $email): bool
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

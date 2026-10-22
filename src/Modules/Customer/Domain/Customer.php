<?php

namespace Core\Modules\Customer\Domain;

class Customer
{
    private CustomerId $id;
    private string $name;
    private Email $email;

    public function __construct(
        CustomerId $id,
        string $name,
        Email $email
    ) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}

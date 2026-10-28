<?php

namespace Core\Modules\Customer\Domain;

class Customer
{
    private CustomerId $id;
    private Name $name;
    private Email $email;

    public function __construct(
        CustomerId $id,
        Name $name,
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

    public function getName(): Name
    {
        return $this->name;
    }

    public function getEmail(): Email
    {
        return $this->email;
    }
}

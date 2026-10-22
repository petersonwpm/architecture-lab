<?php
namespace App\Modules\Order\Domain;

use App\Modules\Customer\Domain\CustomerId;
use App\Modules\Customer\Domain\Email;

class CustomerSnapshot
{

    public function __construct(private CustomerId $id, private string $name, private Email $email)
    {
    }

    public function getId(): CustomerId
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

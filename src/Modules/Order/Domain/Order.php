<?php

namespace App\Modules\Order\Domain;

class Order
{
    private OrderId $id;
    private CustomerSnapshot $customer;

    public function __construct(OrderId $id, CustomerSnapshot $customer)
    {
        $this->id = $id;
        $this->customer = $customer;
    }

    public function getId(): string
    {
        return $this->id->value();
    }

    public function getCustomer(): CustomerSnapshot
    {
        return $this->customer;
    }
}


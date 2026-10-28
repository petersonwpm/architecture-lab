<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Customer\Domain;

use Core\Modules\Customer\Domain\Customer;
use Core\Modules\Customer\Domain\CustomerId;
use Core\Modules\Customer\Domain\Email;
use Core\Modules\Customer\Domain\Name;
use PHPUnit\Framework\TestCase;

final class CustomerTest extends TestCase
{
    public function testCanCreateAValidCustomer(): void
    {
        $customer = new Customer(
            new CustomerId('98ae7634-6356-48e3-b053-45bda59b132e'),
            new Name('fulano de tal'),
            new Email('admin@domain.com')
        );

        $this->assertSame('98ae7634-6356-48e3-b053-45bda59b132e', $customer->getId()->getValue());
        $this->assertSame('fulano de tal', (string) $customer->getName());
        $this->assertSame('admin@domain.com', $customer->getEmail()->getEmail());
    }
}

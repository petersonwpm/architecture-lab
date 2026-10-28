<?php

declare(strict_types=1);

namespace Core\Tests\Unit\Customer\Domain;

use Core\Modules\Customer\Domain\Email;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

final class EmailTest extends TestCase
{
    public function testRejectsAnInvalidAddressWithTheValueInTheMessage(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('"invalid-email" is not a valid email address');

        new Email('invalid-email');
    }
}

<?php

use App\Customer;
use PHPUnit\Framework\TestCase;

class CustomerTest extends TestCase
{
    /** @test */
    public function paymentProcessed()
    {
        $payment = $this->getMockBuilder('App\Stripe')
                ->setMethods(['pay'])
                ->getMock();
        $payment->expects($this->exactly(1))
                ->method('pay')
                ->willReturn(true);

        $customer = new Customer($payment);
        $customer->total = 200;

        $this->assertTrue($customer->checkout());
    }
}

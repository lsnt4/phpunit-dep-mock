<?php

namespace App;

class Customer
{
    public $total = 0;

    protected $payment;

    public function __construct(Stripe $payment)
    {
        $this->payment = $payment;
    }

    public function checkout()
    {
        return $this->payment->pay($this->total);
    }
}
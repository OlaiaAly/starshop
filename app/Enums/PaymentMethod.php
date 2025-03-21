<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case M_PESA = 'mpesa';
    case PAYPAL = 'paypal';
    case VISA = 'visa';
}
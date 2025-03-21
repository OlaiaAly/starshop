<?php

namespace App\Enums;

enum PaymentMethod: string
{
    case M_PESA = 'mpesa';
    case PAYPAL = 'paypal';
    case VISA = 'visa';





    public static function labels(): array
    {
        return [
            self::M_PESA->value => 'M-Pesa',
            self::PAYPAL->value => 'Pay Pal',
            self::VISA-> value => 'Visa'
        ];
    }
}
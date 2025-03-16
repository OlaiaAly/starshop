<?php

namespace App\Models;

use Binafy\LaravelCart\LaravelCart as BaseCardItem;

class CartItem extends BaseCardItem
{
    protected $casts = [
        'options' => 'array',
    ];
}

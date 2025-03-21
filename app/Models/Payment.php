<?php

namespace App\Models;

use App\Enums\PaymentMethod;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $guarded = [];


    protected $casts = [
        'method' => PaymentMethod::class,
    ];



    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

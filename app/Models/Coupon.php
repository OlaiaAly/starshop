<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $guarded = [];


    public function isValid()
    {
        return (!$this->usage_limit || $this->times_used < $this->usage_limit) &&
               (!$this->expires_at || $this->expires_at > now());
    }
}

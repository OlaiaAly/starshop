<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promoter extends Model
{
    use HasFactory;



    public function sales()
    {
        return $this->hasMany(Sale::class);
    }


    public function coupons()
    {
        return $this->hasMany(Coupon::class, 'promoter_id');
    }
}

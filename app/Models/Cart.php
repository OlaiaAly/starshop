<?php

namespace App\Models;

use \Binafy\LaravelCart\Models\Cart as CartFacade;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Concerns\HasRelationships;

class Cart extends CartFacade
{
    use HasRelationships;

    protected $guarded = [];



    public function coupon()
    {
        return $this->belongsTo(Coupon::class);
    }
}

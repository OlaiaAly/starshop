<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Binafy\LaravelCart\Cartable;


class Product extends Model  implements HasMedia, Cartable
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded=[];

    public function vendor(){

        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }


    public function category(){

        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function subcategory(){

        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }
    

    public function brand(){

        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->withResponsiveImages()->singleFile();
        $this->addMediaCollection('products')->withResponsiveImages();
    }

    /**
     * FROM CART
     */
    public function getPrice(): float
    {
        return (float) ($this->selling_price);
    }


}

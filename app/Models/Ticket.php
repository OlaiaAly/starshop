<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
class Ticket extends Model implements HasMedia
{
    protected $guarded=[];
    use HasFactory;
    use InteractsWithMedia;
    protected $fillable = [
        'event_name',
        'event_date',
        'location',
        'price_normal',
        'price_vip',
        'quantity_normal',
        'quantity_vip',
        'event_type', // Enum para tipos de eventos
        'description',
        'status',
        'vendor_id',
        'slug',
        'tags'
    ];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('cover')->withResponsiveImages()->singleFile();
        $this->addMediaCollection('ticket')->withResponsiveImages()->singleFile();
    }

    public function promotor(){

        return $this->belongsTo(User::class, 'vendor_id', 'id');
    }


    public function category(){

        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    

    public function subcategory(){

        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }
}

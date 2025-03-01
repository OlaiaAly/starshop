<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * 
 *
 * @property int $id
 * @property string $brand_name
 * @property string $brand_slug
 * @property string $bramd_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand query()
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBramdImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereUpdatedAt($value)
 * @property string $brand_image
 * @method static \Illuminate\Database\Eloquent\Builder|Brand whereBrandImage($value)
 * @mixin \Eloquent
 */
class Category extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded=[];

    protected $fillable = [
        'category_name',
        'category_slug' ,
        'category_image' 
];
    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('categories')->withResponsiveImages()->singleFile();
    }

}

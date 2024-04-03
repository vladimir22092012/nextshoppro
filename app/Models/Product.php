<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes, Filterable;

    protected $fillable = [
        'category_id',
        'article',
        'name',
        'short_description',
        'description',
        'price',
        'count',
        'deleted_at',
        'created_at',
        'updated_at',
        'search_indexes',
    ];

    protected $appends = [
        'formattedPrice',
        'actualPrice',
        'normalizeImages',
        'mainImage'
    ];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getFormattedPriceAttribute(): string
    {
        return $this->actualPrice . ' Руб.';
    }

    public function getActualPriceAttribute()
    {
        return $this->price;
    }

    public function getNormalizeImagesAttribute(): array
    {
        $images = [];

        foreach ($this->images as $image) {
            $temp = $image->toArray();

            $temp['src'] = $this->getFormattedSrc($image->product_id, $image);

            $images[] = $temp;
        }

        return $images;
    }

    public function getMainImageAttribute(): array
    {
        $image = $this->images()->orderBy('sort', "ASC")->first();
        if ($image) {
            $temp = $image->toArray();
            $temp['src'] = $this->getFormattedSrc($image->product_id, $image);
            return $temp;

        }
        return [];
    }

    public function getFormattedSrc($product_id, $image): string
    {
        return '/images/products/'.$product_id.'/'.$image->id.'.'.$image->ext;
    }

}

<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
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
    ];

    protected $appends = [
        'formattedPrice'
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function getFormattedPriceAttribute(): string
    {
        return $this->price . ' Руб.';
    }

}

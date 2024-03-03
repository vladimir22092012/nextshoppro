<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'title',
        'sort',
        'width',
        'height',
        'size',
        'original_filename',
        'ext',
        'created_at',
        'updated_at',
    ];
}

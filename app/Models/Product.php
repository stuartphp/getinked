<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';

    protected $fillable = [
        'id',
        'code',
        'name',
        'slug',
        'short_description',
        'description',
        'keywords',
        'on_hand',
        'product_category_id',
        'product_unit_id',
        'cost_price',
        'deductable',
        'retail_price',
        'special_price',
        'special_from',
        'special_to',
        'is_feature',
        'is_service',
        'is_active',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class,  'product_category_id');
    }
    
    public function unit()
    {
        return $this->hasOne(ProductUnit::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }
}

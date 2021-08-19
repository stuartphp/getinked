<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;
    protected $table = 'product_categories';
    protected $fillable =[
        'name',
        'parent_id',
        'slug',
        'is_active'
    ];

    public function parent()
    {
        return $this->hasOne(ProductCategory::class, 'id', 'parent_id');
    }

    public function product()
    {
        $this->belongsTo(Product::class);
    }
}

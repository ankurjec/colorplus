<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'category_id', 'images'];

    // public function category()
    // {
    //     return $this->belongsTo(Category::class, 'category_id');
    // }

    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function specification()
    {
        return $this->hasOne(Specification::class);
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class);
    }

    public function newProduct()
    {
        return $this->hasOne(NewProduct::class);
    }

    public function popularProduct()
    {
        return $this->hasOne(PopularProduct::class);
    }

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}

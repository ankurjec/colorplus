<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderdetailItem extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function orderDetail()
    {
        return $this->belongsTo(OrderDetail::class);
    }

    public function productImage()
    {
        return $this->belongsTo(ProductImage::class, 'product_id');
    }
}

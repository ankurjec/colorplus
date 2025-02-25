<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDesign extends Model
{
    use HasFactory;
    protected $table = 'product_designs'; // Explicitly setting the table name

    protected $fillable = ['user_id', 'image_path'];

}

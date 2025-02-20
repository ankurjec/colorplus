<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specification extends Model
{
    use HasFactory;

    protected $fillable = ['hpis_code', 'healthy_providers', 'latex_free', 'medication_route', 'product_id'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

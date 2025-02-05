<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Product extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function images(): HasMany
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }

    public function complectation(): HasMany
    {
        return $this->hasMany(ProductComplectation::class, 'product_id', 'id');
    }
}

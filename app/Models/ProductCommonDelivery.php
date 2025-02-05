<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProductCommonDelivery extends Model
{
    use HasFactory;

    public function delivery(): BelongsTo
    {
        return $this->belongsTo(ProductCommonDeliveryType::class, 'delivery_type_id', 'id');
    }
}

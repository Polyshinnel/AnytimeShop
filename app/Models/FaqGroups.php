<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FaqGroups extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function faqItem(): HasMany
    {
        return $this->hasMany(Faq::class, 'faq_group_id', 'id');
    }
}

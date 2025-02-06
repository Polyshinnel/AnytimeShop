<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Faq extends Model
{
    use HasFactory;

    public function faqGroup(): BelongsTo
    {
        return $this->belongsTo(FaqGroups::class, 'faq_group_id', 'id');
    }
}

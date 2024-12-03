<?php

namespace App\Repository\Promocode;

use App\Models\Promocodes;

class PromocodeRepository
{
    public function getPromocodeByName(string $name): ?Promocodes
    {
        return Promocodes::where('name', $name)->first();
    }
}

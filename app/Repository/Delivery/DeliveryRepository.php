<?php

namespace App\Repository\Delivery;

use App\Models\DeliveryMethod;

class DeliveryRepository
{
    public function getDeliveryMethod(int $id): ?DeliveryMethod
    {
        return DeliveryMethod::find($id);
    }

    public function getDeliveryMethodByName(string $deliveryName): ?DeliveryMethod
    {
        return DeliveryMethod::where('name', $deliveryName)->first();
    }
}

<?php

namespace App\Repository\Order;

use App\Models\Order;
use App\Models\OrderDelivery;
use App\Models\OrderDetail;

class OrderRepository
{
    public function createOrder($createArr): Order
    {
        return Order::create($createArr);
    }

    public function createOrderProduct($createArr): void
    {
        OrderDetail::create($createArr);
    }

    public function createOrderDelivery($createArr): void
    {
        OrderDelivery::create($createArr);
    }
}

<?php

namespace App\Service\Cart;

class CommonCartService
{
    public function getTotalCartInfo(array $cart): array
    {
        $formattedCart = [];
        $total = 0;
        $totalSale = 0;
        $totalProducts = 0;
        if($cart)
        {
            foreach ($cart as $item)
            {
                $formattedCart['products'][] = $item;
                $total += $item['total_new'] ? $item['total_new'] : $item['total_price'];
                $totalSale += $item['total_sale'];
                $totalProducts += $item['quantity'];
            }

            $formattedCart['total'] = $total;
            $formattedCart['total_sale'] = $totalSale;
            $formattedCart['count'] = $totalProducts;
        }

        return $formattedCart;
    }

}

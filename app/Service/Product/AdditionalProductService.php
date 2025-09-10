<?php

namespace App\Service\Product;

use App\Models\Product;

class AdditionalProductService
{
    public function getAdditionalProducts(): array
    {
        $additionalProducts = Product::where('category_id', 2)->get();
        $formattedAdditionalProducts = [];
        if($additionalProducts->isEmpty())
        {
            return [];
        }

        foreach ($additionalProducts as $product)
        {
            $formattedAdditionalProducts[] = [
                'url' => sprintf('/catalog/%s', $product->seo_url),
                'name' => $product->name,
                'id' => $product->id,
                'price' => $product->price,
                'benefit' => number_format($product->benefit, 0, '.', ''),
            ];
        }

        return $formattedAdditionalProducts;
    }
}

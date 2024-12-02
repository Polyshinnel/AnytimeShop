<?php

namespace App\Repository\Product;

use App\Models\Product;
use App\Models\ProductCommonChars;
use App\Models\ProductCommonDelivery;
use App\Models\ProductCommonDeliveryType;
use App\Models\ProductCommonWarranty;
use App\Models\ProductComplectation;
use App\Models\ProductImages;
use Illuminate\Database\Eloquent\Collection;

class ProductRepository
{
    public function getAllProducts(): ?Collection
    {
        return Product::all();
    }

    public function getProductById(int $id): ?Collection
    {
        return Product::where('id', $id)->get();
    }

    public function getCommonDeliveries(): ?Collection
    {
        return ProductCommonDeliveryType::all();
    }

    public function getCommonDeliveryTextById(int $id): ?Collection
    {
        return ProductCommonDelivery::where('delivery_type_id', $id)->get();
    }

    public function getCommonChars(): ?Collection
    {
        return ProductCommonChars::all();
    }

    public function getProductComplectationById(int $id): ?Collection
    {
        return ProductComplectation::where('product_id', $id)->get();
    }

    public function getProductImageById(int $id): ?Collection
    {
        return ProductImages::where('product_id', $id)->get();
    }

    public function getCommonWarranty(): ?Collection
    {
        return ProductCommonWarranty::all();
    }
}

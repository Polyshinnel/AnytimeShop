<?php

namespace App\Service\Product;

use App\Models\CommonSettings;
use App\Repository\Product\ProductRepository;
use Illuminate\Support\Facades\Request;

class CommonProductService
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getProducts(string|int $product = NULL): array
    {
        $formattedProducts = [];
        if($product) {
            $products = $this->productRepository->getProductBySeoUrl($product);
            if($products->isEmpty())
            {
                $products = $this->productRepository->getProductById($product);
            }
        } else {
            $products = $this->productRepository->getAllProducts();
        }

        $settings = CommonSettings::all();
        $host = '';
        if(!$settings->isEmpty()) {
            foreach ($settings as $setting) {
                if($setting->name == 'site_host')
                {
                    $host = $setting->value;
                }
            }
        }

        if(!$products->isEmpty())
        {
            $settings = CommonSettings::all();
            $host = '';
            if(!$settings->isEmpty()) {
                foreach ($settings as $setting) {
                    if($setting->name == 'site_host')
                    {
                        $host = $setting->value;
                    }
                }
            }
            foreach ($products as $product) {
                $deliveryInfo = [];
                $deliveryTypes = $this->productRepository->getCommonDeliveries();
                if(!$deliveryTypes->isEmpty())
                {
                    foreach ($deliveryTypes as $deliveryType) {
                        $deliveryData = [
                            'name' => $deliveryType->name,
                            'img' => $deliveryType->img,
                            'text' => []
                        ];
                        $deliveryText = $this->productRepository->getCommonDeliveryTextById($deliveryType->id);
                        if(!$deliveryText->isEmpty())
                        {
                            foreach ($deliveryText as $item)
                            {
                                $deliveryData['text'][] = $item->text;
                            }
                        }
                        $deliveryInfo[] = $deliveryData;
                    }
                }

                $warrantyInfo = [];
                $warrantyInfoData = $this->productRepository->getCommonWarranty();
                if(!$warrantyInfoData->isEmpty())
                {
                    foreach ($warrantyInfoData as $warrantyInfoUnit)
                    {
                        $warrantyInfo[] = $warrantyInfoUnit->warranty_text;
                    }
                }

                $commonProductCharsInfo = [];
                $commonProductChars = $this->productRepository->getCommonChars();
                if(!$commonProductChars->isEmpty())
                {
                    foreach ($commonProductChars as $char)
                    {
                        $commonProductCharsInfo[] = $char->char_text;
                    }
                }

                $productImages = $this->productRepository->getProductImageById($product->id);

                $formattedProductImages = [];

                foreach ($productImages as $productImage)
                {
                    $productImage->alt_img = $productImage->alt_img ?? $product->name;
                    $productImage->title_img = $productImage->title_img ?? $product->name;
                    $formattedProductImages[] = $productImage;
                }

                $productComplectationsInfo = [];
                $productComplectation = $this->productRepository->getProductComplectationById($product->id);
                if(!$productComplectation->isEmpty())
                {
                    foreach ($productComplectation as $complectation)
                    {
                        $productComplectationsInfo[] = $complectation->complect_text;
                    }
                }

                $productFullLink = sprintf('%s/catalog/%s', $host, $product->id);

                $productImg = null;
                if($product->category_id == 1)
                {
                    $productImg = $host.'/storage/'.$productImages[0]['img'];
                }

                $productDescription = strip_tags($product->description);

                $link = $product->seo_url ?? $product->id;
                $thumbnail = $productImages[0]['img'] ?? '';

                $prodArr = [
                    'id' => $product->id,
                    'link' => '/catalog/'.$link,
                    'name' => $product->name,
                    'decription' => $product->description,
                    'clear_description' => strip_tags($product->description),
                    'price' => $product->price,
                    'new_price' => $product->new_price,
                    'thumbnail' => $thumbnail,
                    'complectation' => $productComplectationsInfo,
                    'images' => $formattedProductImages,
                    'warranty' => $warrantyInfo,
                    'delivery' => $deliveryInfo,
                    'common_chars' => $commonProductCharsInfo,
                    'product-full-link' => $productFullLink,
                    'link-to-product-img' => $productImg,
                    'product-link-description' => $productDescription,
                    'meta_title' => $product->meta_title ?? $product->name,
                    'meta_description' => $product->meta_description ?? $productDescription,
                    'category_id' => $product->category_id,
                    'benefit' => $product->benefit,
                    'economy' => $product->economy
                ];

                if($host)
                {
                    $prodArr['full_link'] = $host.$prodArr['link'];
                }

                // Добавляем товары с category_id = 1 (основные товары) и category_id = 2 (стартовые наборы)
                if($product->category_id == 1 || $product->category_id == 2)
                {
                    $formattedProducts[] = $prodArr;
                }
            }
        }

        return $formattedProducts;
    }
}

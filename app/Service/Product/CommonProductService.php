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

    public function getProducts(int $id = NULL): array
    {
        $formattedProducts = [];
        if($id) {
            $products = $this->productRepository->getProductById($id);
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

                $productImages = $this->productRepository->getProductImageById($product->id)->toArray();

                $productComplectationsInfo = [];
                $productComplectation = $this->productRepository->getProductComplectationById($product->id);
                if(!$productComplectation->isEmpty())
                {
                    foreach ($productComplectation as $complectation)
                    {
                        $productComplectationsInfo[] = $complectation->complect_text;
                    }
                }

                $productFullLink = sprintf('%s/catalog/%s', Request::getSchemeAndHttpHost(), $product->id);
                $productImg = Request::getSchemeAndHttpHost().'/storage/'.$productImages[0]['img'];
                $productDescription = strip_tags($product->description);

                $prodArr = [
                    'id' => $product->id,
                    'link' => '/catalog/'.$product->id,
                    'name' => $product->name,
                    'decription' => $product->description,
                    'clear_description' => strip_tags($product->description),
                    'price' => $product->price,
                    'new_price' => $product->new_price,
                    'thumbnail' => $productImages[0]['img'] ? $productImages[0]['img'] : '',
                    'complectation' => $productComplectationsInfo,
                    'images' => $productImages,
                    'warranty' => $warrantyInfo,
                    'delivery' => $deliveryInfo,
                    'common_chars' => $commonProductCharsInfo,
                    'product-full-link' => $productFullLink,
                    'link-to-product-img' => $productImg,
                    'product-link-description' => $productDescription
                ];

                if($host)
                {
                    $prodArr['full_link'] = $host.$prodArr['link'];
                }

                $formattedProducts[] = $prodArr;
            }
        }

        return $formattedProducts;
    }
}

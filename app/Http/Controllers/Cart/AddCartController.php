<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\Product\CommonProductService;
use Illuminate\Http\Request;
use Session;

class AddCartController extends Controller
{
    private CommonProductService $commonProductService;
    private CommonCartService $commonCartService;

    public function __construct(CommonProductService $commonProductService, CommonCartService $commonCartService)
    {
        $this->commonProductService = $commonProductService;
        $this->commonCartService = $commonCartService;
    }

    public function __invoke(Request $request)
    {
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        if($quantity < 1) {
            $quantity = 0;
        }
        $cart = Session::get('cart');


        if(isset($cart[$productId])) {
            $cart[$productId]['quantity'] = $cart[$productId]['quantity'] + $quantity;
            $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
            $cart[$productId]['total_new'] = $cart[$productId]['quantity'] * $cart[$productId]['new_price'];
            $cart[$productId]['total_sale'] = $cart[$productId]['total_new'] ? $cart[$productId]['total_price'] - $cart[$productId]['total_new'] : 0;
        } else {
            $products = $this->commonProductService->getProducts($productId);
            if($products) {
                $product = $products[0];
                $cart[$product['id']]['id'] = $product['id'];
                $cart[$product['id']]['name'] = $product['name'];
                $cart[$product['id']]['link'] = $product['link'];
                $cart[$product['id']]['price'] = $product['price'];
                $cart[$product['id']]['new_price'] = $product['new_price'];
                $cart[$product['id']]['quantity'] = $quantity;
                $cart[$product['id']]['thumbnail'] = $product['thumbnail'];
                $cart[$product['id']]['total_price'] = $cart[$product['id']]['quantity'] * $cart[$product['id']]['price'];
                $cart[$product['id']]['total_new'] = $cart[$product['id']]['quantity'] * $cart[$product['id']]['new_price'];
                $cart[$product['id']]['total_sale'] = $cart[$productId]['total_new'] ? $cart[$productId]['total_price'] - $cart[$productId]['total_new'] : 0;
            }
        }
        Session::put('cart', $cart);
        $cartInfo = $this->commonCartService->getTotalCartInfo($cart);

        return response()->json($cartInfo);
    }
}

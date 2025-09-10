<?php

namespace App\Http\Controllers\Cart;

use App\Http\Controllers\Controller;
use App\Service\Cart\CommonCartService;
use App\Service\Product\CommonProductService;
use Illuminate\Http\Request;

class DeleteCartController extends Controller
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
        $cart = session('cart');
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity');
        
        // Инициализируем корзину как пустой массив, если она не существует
        if (!$cart) {
            $cart = [];
        }

        if(isset($cart[$productId]))
        {
            if($cart[$productId]['quantity'] > $quantity)
            {
                $cart[$productId]['quantity'] = $cart[$productId]['quantity'] - $quantity;
                $cart[$productId]['total_price'] = $cart[$productId]['quantity'] * $cart[$productId]['price'];
                $cart[$productId]['total_new'] = $cart[$productId]['quantity'] * $cart[$productId]['new_price'];
                $cart[$productId]['total_sale'] = $cart[$productId]['total_new'] ? $cart[$productId]['total_price'] - $cart[$productId]['total_new'] : 0;
            }
            else
            {
                unset($cart[$productId]);
            }
            session(['cart' => $cart]);
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
            return response()->json($cartInfo);
        }

        return response()->json([]);
    }
}

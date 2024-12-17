<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\BasePageController;
use App\Http\Controllers\Controller;
use App\Models\Sertificate;
use App\Service\Cart\CommonCartService;
use Illuminate\Http\Request;

class SertificatesPageController extends BasePageController
{
    private CommonCartService $commonCartService;

    public function __construct(CommonCartService $commonCartService)
    {
        $this->commonCartService = $commonCartService;
    }

    public function __invoke(Request $request)
    {
        $sertificates = Sertificate::all();
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $pageInfo = $this->getPageInfo($request);
        return view('Pages.Sertificates', ['cart' => $cartInfo, 'pageInfo' => $pageInfo, 'certificates' => $sertificates]);
    }
}

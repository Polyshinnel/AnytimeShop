<?php

namespace App\Http\Controllers\Pages;

use App\Api\BelExchangeApi;
use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use App\Service\Cart\CommonCartService;
use Carbon\Carbon;

class OrderController extends Controller
{
    private CommonCartService $commonCartService;
    private BelExchangeApi $belExchangeApi;

    public function __construct(CommonCartService $commonCartService, BelExchangeApi $belExchangeApi)
    {
        $this->commonCartService = $commonCartService;
        $this->belExchangeApi = $belExchangeApi;
    }

    public function __invoke()
    {
        $cart = session('cart');
        $cartInfo = [];
        if($cart) {
            $cartInfo = $this->commonCartService->getTotalCartInfo($cart);
        }
        $pageInfo = SiteSettings::where('active', true)->first();
        $currencyInfo = [];
        if($pageInfo['exchange'])
        {
            $currencyInfo = $this->belExchangeApi->getPriceByMoney($pageInfo['currency_code'], $pageInfo['money_quantity']);
            if($currencyInfo)
            {
                $currencyInfo['total_bel_exchange'] = round($cartInfo['total'] / $currencyInfo['money'], 2);
                $currencyInfo['current_date'] = Carbon::now()->format('d.m.Y H:i');
            }
        }

        return view('Pages.Order', ['cart' => $cartInfo, 'pageInfo' => $pageInfo, 'currency_info' => $currencyInfo]);
    }
}

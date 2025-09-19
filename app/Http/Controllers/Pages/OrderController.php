<?php

namespace App\Http\Controllers\Pages;

use App\Api\BelExchangeApi;
use App\Api\KzExchangeApi;
use App\Api\RuExchangeApi;
use App\Http\Controllers\Controller;
use App\Models\SiteSettings;
use App\Service\Cart\CommonCartService;
use Carbon\Carbon;

class OrderController extends Controller
{
    private CommonCartService $commonCartService;
    private BelExchangeApi $belExchangeApi;
    private RuExchangeApi $ruExchangeApi;
    private KzExchangeApi $kzExchangeApi;

    public function __construct(
        CommonCartService $commonCartService,
        BelExchangeApi $belExchangeApi,
        RuExchangeApi $ruExchangeApi,
        KzExchangeApi $kzExchangeApi
    )
    {
        $this->commonCartService = $commonCartService;
        $this->belExchangeApi = $belExchangeApi;
        $this->ruExchangeApi = $ruExchangeApi;
        $this->kzExchangeApi = $kzExchangeApi;
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


        if($cartInfo)
        {
            if($pageInfo['exchange'])
            {
                if($pageInfo['currency_code'] == '456')
                {
                    $currencyInfo = $this->ruExchangeApi->getExchange();
                    $link = 'https://cbr.ru/';
                    $linkTitle = 'Центральный банк Российской Федерации';
                }

                if($pageInfo['currency_code'] == '459')
                {
                    $currencyInfo = $this->kzExchangeApi->getExchange();
                    $link = 'https://www.nationalbank.kz/ru';
                    $linkTitle = 'Национальный банк Казахстана';
                }

                if($currencyInfo)
                {
                    $currencyInfo['total_bel_exchange'] = round($cartInfo['total'] / $currencyInfo['money'], 2);
                    $currencyInfo['current_date'] = Carbon::now()->format('d.m.Y H:i');
                    $currencyInfo['link'] = $link;
                    $currencyInfo['link_title'] = $linkTitle;

                    $newCart = [
                        'total' => $cartInfo['total'],
                        'total_sale' => $cartInfo['total_sale'],
                        'count' => 2,
                        'currency' => 'Р'
                    ];

                    foreach ($cartInfo['products'] as $product)
                    {
                        $product['currency_total'] = round($product['total_price'] / $currencyInfo['money'], 2);
                        if($product['total_new'])
                        {
                            $product['currency_total'] = round($product['total_new'] / $currencyInfo['money'], 2);
                        }

                        $newCart['products'][] = $product;
                    }

                    $cartInfo = $newCart;

                }
            }
        }

        return view('Pages.Order', ['cart' => $cartInfo, 'pageInfo' => $pageInfo, 'currency_info' => $currencyInfo]);
    }
}

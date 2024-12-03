<?php

namespace App\Service\Promocode;

use App\Repository\Promocode\PromocodeRepository;
use App\Service\Cart\CommonCartService;

class CommonPromocodeService
{
    private PromocodeRepository $promocodeRepository;
    private CommonCartService $commonCartService;

    public function __construct(
        PromocodeRepository $promocodeRepository,
        CommonCartService $commonCartService
    )
    {
        $this->promocodeRepository = $promocodeRepository;
        $this->commonCartService = $commonCartService;
    }

    public function getPromocodeData($promocode, $totalSum): array
    {
        $promocodeData = $this->promocodeRepository->getPromocodeByName($promocode);
        $oldTotalSum = $totalSum;
        if($promocodeData){
            $salePercent = $promocodeData->sale_percent;
            $totalSum = ceil($totalSum * ((100 - $salePercent))/100);
            $message = sprintf(
                'Вы применили промокод %s на %s процентов',
                $promocode,
                $salePercent
            );
            $cart = session('cart');
            $cart['promocode'] = $promocode;
            return [
                'message' => $message,
                'total_sum' => $totalSum,
                'old_total_sum' => $oldTotalSum,
                'err' => 'none'
            ];

        }
        return [
            'message' => 'Такого промокода не существует! Попробуйте ввести другой',
            'err' => 'Empty promocode'
        ];
    }
}

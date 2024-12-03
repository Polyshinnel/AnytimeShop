<?php

namespace App\Http\Controllers\Promocode;

use App\Http\Controllers\Controller;
use App\Http\Requests\PromocodeRequest;
use App\Service\Promocode\CommonPromocodeService;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    private CommonPromocodeService $commonPromocodeService;

    public function __construct(CommonPromocodeService $commonPromocodeService)
    {
        $this->commonPromocodeService = $commonPromocodeService;
    }

    public function __invoke(PromocodeRequest $request)
    {
        $data = $request->validated();
        $totalSum = $data['total_sum'];
        $promocode = $data['promocode'];
        $promocode = strtoupper($promocode);
        $result = $this->commonPromocodeService->getPromocodeData($promocode, $totalSum);
        return response()->json($result);
    }
}

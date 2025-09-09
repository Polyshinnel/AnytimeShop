<?php

namespace App\Api;

use App\Tools\RequestTool;

class BelExchangeApi
{
    private RequestTool $requestTool;

    public function __construct(RequestTool $requestTool)
    {
        $this->requestTool = $requestTool;
    }

    public function getPriceByMoney(string $currencyCode, int $moneyQuantity): array
    {
        $url = sprintf('https://api.nbrb.by/exrates/rates/%s', $currencyCode);
        $response = $this->requestTool->requestTool('GET', $url);
        if($response['response'])
        {
            $responseData = json_decode($response['response'], true);
            $belMoney = $responseData['Cur_OfficialRate'];
            $moneyResult = round(($moneyQuantity/$belMoney), 2);
            return [
                'curr_code' => $currencyCode,
                'money' => $moneyResult
            ];
        }
        return [];
    }
}

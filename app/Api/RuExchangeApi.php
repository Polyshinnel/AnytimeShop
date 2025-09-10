<?php

namespace App\Api;

use App\Tools\RequestTool;
use Carbon\Carbon;

class RuExchangeApi
{
    private RequestTool $requestTool;

    public function __construct(RequestTool $requestTool)
    {
        $this->requestTool = $requestTool;
    }

    public function getExchange()
    {
        $url = 'https://cbr.ru/scripts/XML_daily.asp';
        $response = $this->requestTool->requestTool('GET', $url);
        if($response['response']) {
            $data = simplexml_load_string($response['response']);
            if($data)
            {
                $valutes = $data->Valute;
                foreach($valutes as $valute)
                {
                    if($valute->CharCode == 'BYN')
                    {
                        $valuteValue = (string)$valute->Value;
                        $valuteValue = str_replace(',', '.', $valuteValue);
                        $valuteValue = round($valuteValue, 2);
                        return [
                            'curr_code' => 'BYN',
                            'money' => (string)$valuteValue
                        ];
                    }
                }
            }
        }
        return [];
    }

}

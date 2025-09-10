<?php

namespace App\Api;

use App\Tools\RequestTool;
use Carbon\Carbon;

class KzExchangeApi
{
    private RequestTool $requestTool;

    public function __construct(RequestTool $requestTool)
    {
        $this->requestTool = $requestTool;
    }

    public function getExchange()
    {
        $date = Carbon::now()->format('d.m.Y');
        $url = sprintf('https://nationalbank.kz/rss/get_rates.cfm?fdate=%s', $date);
        $response = $this->requestTool->requestTool('GET', $url);
        if($response['response']) {
            $data = simplexml_load_string($response['response']);
            $items = $data->item;
            if($items) {
                foreach($items as $item) {
                    if($item->title == 'BYN') {
                        return [
                            'curr_code' => 'BYN',
                            'money' => (string)$item->description
                        ];
                    }
                }
            }
        }
        return [];
    }
}

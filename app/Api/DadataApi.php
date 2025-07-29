<?php

namespace App\Api;

use App\Tools\RequestTool;

class DadataApi
{
    private string $apiKey;
    private string $secret;
    private RequestTool $requestTool;

    public function __construct(RequestTool $requestTool)
    {
        $this->apiKey = config('dadata.api_key');
        $this->secret = config('dadata.secret');
        $this->requestTool = $requestTool;
    }

    public function getNameInfo(string $userName): ?string
    {
        $headers = [
            "Content-Type: application/json",
            "Authorization: Token {$this->apiKey}",
            "X-Secret: {$this->secret}",
        ];
        $url = 'https://cleaner.dadata.ru/api/v1/clean/name';
        $data = [$userName];
        $response = $this->requestTool->requestTool('POST', $url, json_encode($data), $headers);
        return $response['response'];
    }
}

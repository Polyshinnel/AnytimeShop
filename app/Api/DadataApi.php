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

    public function suggestAddress(string $query, int $count = 10): ?array
    {
        $headers = [
            "Content-Type: application/json",
            "Authorization: Token {$this->apiKey}",
            "X-Secret: {$this->secret}",
        ];
        $url = 'https://suggestions.dadata.ru/suggestions/api/4_1/rs/suggest/address';
        $data = [
            'query' => $query,
            'count' => $count
        ];
        $response = $this->requestTool->requestTool('POST', $url, json_encode($data), $headers);
        
        if (isset($response['response']) && is_string($response['response'])) {
            $decoded = json_decode($response['response'], true);
            return $decoded ?? null;
        }
        
        return $response['response'] ?? null;
    }
}

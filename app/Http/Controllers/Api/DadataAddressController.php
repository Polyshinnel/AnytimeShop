<?php

namespace App\Http\Controllers\Api;

use App\Api\DadataApi;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DadataAddressController extends Controller
{
    private DadataApi $dadataApi;

    public function __construct(DadataApi $dadataApi)
    {
        $this->dadataApi = $dadataApi;
    }

    public function suggest(Request $request)
    {
        $query = $request->input('query', '');
        
        if (empty($query)) {
            return response()->json(['suggestions' => []]);
        }

        $suggestions = $this->dadataApi->suggestAddress($query);
        
        if (!$suggestions || !isset($suggestions['suggestions'])) {
            return response()->json(['suggestions' => []]);
        }

        return response()->json($suggestions);
    }
}


<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use Illuminate\Http\Request;

class BasePageController extends Controller
{
    public function getPageInfo(Request $request)
    {
        $pageName = $request->path();
        $pageInfo = SiteInfo::where('url', $pageName)->first()->toArray();
        $pageInfo['canonical_url'] = $request->url();
        if($pageInfo['url'] == '/')
        {
            $pageInfo['canonical_url'] = $pageInfo['canonical_url'].'/';
        }
        return $pageInfo;
    }
}

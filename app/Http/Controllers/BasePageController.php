<?php

namespace App\Http\Controllers;

use App\Models\SiteInfo;
use App\Models\SiteSettings;
use Illuminate\Http\Request;

class BasePageController extends Controller
{
    public function getPageInfo(Request $request)
    {
        $pageName = $request->path();
        $pageInfo = SiteInfo::where('url', $pageName)->first()->toArray();
        $pageInfo['canonical_url'] = $request->url();
        $siteSettings = SiteSettings::where('active', true)->first();
        if($pageInfo['url'] == '/')
        {
            $pageInfo['canonical_url'] = $pageInfo['canonical_url'].'/';
        }
        $pageInfo['currency'] = $siteSettings->currency;
        $pageInfo['number_format'] = $siteSettings->number_format;
        return $pageInfo;
    }
}

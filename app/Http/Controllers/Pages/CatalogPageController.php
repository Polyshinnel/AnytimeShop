<?php

namespace App\Http\Controllers\Pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CatalogPageController extends Controller
{
    public function __invoke()
    {
        return view('Pages.CatalogPage');
    }
}

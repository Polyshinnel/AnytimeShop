<?php

use App\Http\Controllers\Pages\AboutPageController;
use App\Http\Controllers\Pages\CatalogPageController;
use App\Http\Controllers\Pages\ContactsPageController;
use App\Http\Controllers\Pages\DeliveryPageController;
use App\Http\Controllers\Pages\DocumentationPageController;
use App\Http\Controllers\Pages\FaqPageController;
use App\Http\Controllers\Pages\HomePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePageController::class);
Route::get('/about', AboutPageController::class);
Route::get('/catalog', CatalogPageController::class);
Route::get('/documentation', DocumentationPageController::class);
Route::get('/delivery', DeliveryPageController::class);
Route::get('/faq', FaqPageController::class);
Route::get('/contacts', ContactsPageController::class);

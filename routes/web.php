<?php

use App\Http\Controllers\Cart\AddCartController;
use App\Http\Controllers\Cart\DeleteCartController;
use App\Http\Controllers\Cart\GetCartController;
use App\Http\Controllers\Orders\StoreOrderController;
use App\Http\Controllers\Pages\AboutPageController;
use App\Http\Controllers\Pages\Catalog\CatalogPageController;
use App\Http\Controllers\Pages\Catalog\ProductPageController;
use App\Http\Controllers\Pages\ContactsPageController;
use App\Http\Controllers\Pages\DeliveryPageController;
use App\Http\Controllers\Pages\DocumentationPageController;
use App\Http\Controllers\Pages\FaqPageController;
use App\Http\Controllers\Pages\HelpPageController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\OrderController;
use App\Http\Controllers\Promocode\PromocodeController;
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
Route::get('/catalog/{product_id}', ProductPageController::class);
Route::get('/order', OrderController::class);
Route::get('/order/success', function () {
    return view('Pages.SuccessOrder', ['cart' => []]);
});
Route::get('/help', HelpPageController::class);

Route::post('/add-cart', AddCartController::class);
Route::post('/remove-cart', DeleteCartController::class);
Route::post('/cart/get-cart', GetCartController::class);

Route::post('/promocode', PromocodeController::class);
Route::post('/order/create', StoreOrderController::class);

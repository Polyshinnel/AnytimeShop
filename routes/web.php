<?php

use App\Http\Controllers\Cart\AddCartController;
use App\Http\Controllers\Cart\DeleteCartController;
use App\Http\Controllers\Cart\GetCartController;
use App\Http\Controllers\Orders\StoreOrderController;
use App\Http\Controllers\Pages\AboutPageController;
use App\Http\Controllers\Pages\ArticlesItemPageController;
use App\Http\Controllers\Pages\ArticlesPageController;
use App\Http\Controllers\Pages\Catalog\CatalogPageController;
use App\Http\Controllers\Pages\Catalog\ProductPageController;
use App\Http\Controllers\Pages\ContactsPageController;
use App\Http\Controllers\Pages\DeliveryPageController;
use App\Http\Controllers\Pages\DocumentationPageController;
use App\Http\Controllers\Pages\FaqPageController;
use App\Http\Controllers\Pages\HelpPageController;
use App\Http\Controllers\Pages\HomePageController;
use App\Http\Controllers\Pages\NewsItemPageController;
use App\Http\Controllers\Pages\NewsPageController;
use App\Http\Controllers\Pages\OrderController;
use App\Http\Controllers\Pages\PolicyPage;
use App\Http\Controllers\Pages\SertificatesPageController;
use App\Http\Controllers\Promocode\PromocodeController;
use App\Http\Controllers\SendFormDataController;
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
Route::get('/catalog/{product}', ProductPageController::class);
Route::get('/order', OrderController::class);
Route::get('/order/success', function () {
    return view('Pages.SuccessOrder', ['cart' => []]);
});
Route::get('/help', HelpPageController::class);
Route::get('/sertificates', SertificatesPageController::class);
Route::get('/news', NewsPageController::class);
Route::get('/news/{news_item}', NewsItemPageController::class);
Route::get('/articles', ArticlesPageController::class);
Route::get('/articles/{article}', ArticlesItemPageController::class);
Route::get('/policy', PolicyPage::class);

Route::post('/add-cart', AddCartController::class);
Route::post('/remove-cart', DeleteCartController::class);
Route::post('/cart/get-cart', GetCartController::class);

Route::post('/promocode', PromocodeController::class);
Route::post('/order/create', StoreOrderController::class);

Route::post('/send-form', SendFormDataController::class);


<?php
use App\Http\Controllers\OrderssController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\GroupsController;
use App\Http\Controllers\BananaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('', [BananaController::class, 'index']);
Route::get('/products/welcome', [BananaController::class, 'welcome']);
// Route::get('/products', [BananaController::class, 'index']);
// Route::get('/products/create', [BananaController::class, 'create']);
// Route::post('/products', [BananaController::class, 'store']);
// Route::get('/products/{Id}', [BananaController::class, 'show']);
// Route::get('/products/{Id}/edit', [BananaController::class, 'edit']);
// Route::put('/products/{Id}', [BananaController::class, 'update']);
// Route::delete('/products/{Id}', [BananaController::class, 'destroy']);

Route::resources([
    'products' => BananaController::class,
    'groups' => GroupsController::class,
    'orders' => OrdersController::class,
    'payments' => PaymentsController::class,
]);


<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CartItemController;
use Illuminate\Http\Request;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::apiResource('categories', CategoryController::class)
    ->only(['index', 'show']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('user', function (Request $request) {
         return response()->json($request->user());
});

    Route::get('/products', [ProductController::class, 'index']);
    Route::get('/products/{product}', [ProductController::class, 'show']);

    Route::apiResource('categories', CategoryController::class)
        ->only(['store', 'update', 'destroy']);

    Route::apiResource('users', UserController::class);

    Route::apiResource('cart-items', CartItemController::class);
});

Route::middleware(['auth:sanctum', 'admin'])->group(function () {

    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{product}', [ProductController::class, 'update']);
    Route::patch('/products/{product}', [ProductController::class, 'update']);
    Route::delete('/products/{product}', [ProductController::class, 'destroy']);
});

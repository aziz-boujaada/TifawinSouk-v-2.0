<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\OrderItemController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestProductController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //c art routers
    Route::get('/cart' , [CartController::class , 'index'])->name('cart');
    Route::post('/cart/items', [CartItemController::class, 'store'])->name('cartItem.store');
    Route::put('/cart/items/{cartItem}', [CartItemController::class, 'update'])->name('cartItem.update');
    Route::delete('/cart/items/{cartItem}', [CartItemController::class, 'destroy'])->name('cartItem.destroy');
   
    
    //ordrers routers
    Route::get('/orders' , [OrderController::class , 'index'])->name('orders');
    Route::get('/orders/{order}' , [OrderController::class , 'show'])->name('orders.show');
    Route::get('/test/{product}', [TestProductController::class, 'index'])->name('product-ui');
    Route::post('/orders/add/', [OrderController::class, 'store'])->name('save-order-items');
    
});


require __DIR__.'/auth.php';



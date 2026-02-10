<?php


use App\Http\Controllers\ProductController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CartItemController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestProductController;
use App\Http\Controllers\DahsboardController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', action: [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //c art routers
    Route::get('/cart' , [CartController::class , 'index'])->name('cart');
    Route::post('/cart/add', [CartController::class, 'addProduct'])->name('cart.add');
    Route::patch('/cart/update/{product}', [CartController::class, 'updateProduct'])->name('cart.update');
    Route::delete('/cart/remove/{product}', [CartController::class, 'removeProduct'])->name('cart.remove'); 
    
    //ordrers routers
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');
    Route::get('/test/{product}', [TestProductController::class, 'index'])->name('product-ui');
    Route::post('/orders/add/', [OrderController::class, 'store'])->name('save-order-items');
    Route::get('orders/edit/{order}', [OrderController::class, 'edit'])->name('edit-order');
    Route::put('orders/update/{order}', [OrderController::class, 'update'])->name('update-order');


    // dashboard  routers
    Route::get('/dashboard', [DahsboardController::class, 'index'])->name('dashboard');


    Route::prefix('categories')->name('categories.')->group(function () {

        Route::get('/', [CategoryController::class, 'index'])->name('index');

        Route::get('/create', [CategoryController::class, 'create'])->name('create');

        Route::post('/', [CategoryController::class, 'store'])->name('store');

        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('edit');

        Route::put('/{category}', [CategoryController::class, 'update'])->name('update');

        Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
    });


    Route::prefix('suppliers')->name('suppliers.')->group(function () {
        
        Route::get('/', [SupplierController::class, 'index'])->name('index');
        
        Route::get('/create', [SupplierController::class, 'create'])->name('create');
        
        Route::post('/', [SupplierController::class, 'store'])->name('store');
        
        Route::get('/{supplier}', [SupplierController::class, 'show'])->name('show');
        
        Route::get('/{supplier}/edit', [SupplierController::class, 'edit'])->name('edit');
        
        Route::put('/{supplier}', [SupplierController::class, 'update'])->name('update');
        
        Route::delete('/{supplier}', [SupplierController::class, 'destroy'])->name('destroy');
    });

    
    Route::prefix('products')->name('products.')->group(function () {
        
        Route::get('/', [ProductController::class, 'index'])->name('index');
        
        Route::get('/create', [ProductController::class, 'create'])->name('create');
        
        Route::post('/', [ProductController::class, 'store'])->name('store');
        
        Route::get('/archived', [ProductController::class, 'archived'])->name('archived');
        
        Route::get('/{product}', [ProductController::class, 'show'])->name('show');
        
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('edit');
        
        Route::put('/{product}', [ProductController::class, 'update'])->name('update');
        
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
        
        Route::post('/{id}/restore', [ProductController::class, 'restore'])->name('restore');
    });

    
});


require __DIR__ . '/auth.php';

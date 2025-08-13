<?php
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AddProductsController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;

Route::get('/home' , [PageController::class, 'homePage'])->name('user.home');
Route::get('/shop' , [PageController::class, 'shop']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/services', [PageController::class, 'services']);
Route::get('/blog', [PageController::class, 'blog']);
Route::get('/cart', [PageController::class, 'cart']);

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login-form');

Route::get('/registration', [AuthController::class, 'showRegisterForm']);
Route::post('/register', [AuthController::class, 'store']);

Route::middleware(['auth', 'role.check'])->group(function () {
    Route::get('/admin', [AdminController::class,'AdminHome'])->name('admin.dashboard');
});

Route::middleware(['prevent.admin'])-> group(function(){
Route::get('/home' , [PageController::class, 'homePage'])->name('user.home');
Route::get('/shop' , [PageController::class, 'shop']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/contact', [PageController::class, 'contact']);
Route::get('/services', [PageController::class, 'services']);
Route::get('/blog', [PageController::class, 'blog']);
Route::get('/cart', [PageController::class, 'cart']);
});


Route::get('/products',[AddProductsController::class, 'products']);

Route::get('/categories', [CategoryController::class, 'Index'])->name('category.list');         // show all categories
Route::get('/add-categories', [CategoryController::class, 'Create'])->name('category.create');  // show add form
Route::post('/store-categories', [CategoryController::class, 'Store'])->name('category.store'); // store form data

Route::POSt('/categories', [CategoryController::class, 'Store'])-> name('category.store');
Route::post('/add_category', [CategoryController::class, 'Store']);

Route::get('/delete/category/{id}', [CategoryController::class, 'DeleteId']);
Route::get('/update/category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');


Route::get('/index-product', [AddProductsController::class, 'index'])->name('product.index');


Route::get('/all-products', [AddProductsController::class, 'IndexProduct'])-> name('Product.list');
Route::get('/add-products', [AddProductsController::class, 'AddProducts'])->name('add.products');
Route::post('/store-Products',  [AddProductsController::class, 'store_product'])->name('products.store');

Route::get('/delete-product/{id}', [AddProductsController::class, 'deleteProduct']);


Route::get('/edit-product/{id}', [AddProductsController::class, 'editProduct'])->name('product.edit');
Route::put('/update-propduct/{id}',[AddProductsController::class, 'updateProduct'])->name('product.update');



Route::get('/add-images', [AuthController::class, 'showImagesForm'])->name('show.form');
Route::post('/add-images', [AuthController::class, 'storeImages'])->name('store.images');

Route::get('/delete/{id}', [AuthController::class, 'deleteImage'])->name('delete.image');


Route::get('/explore-products', [AddProductsController::class, 'ExploreProducts'])->name('explore.products');
Route::get('/explore-products', [PageController::class, 'ExploreProducts'])->name('explore.products');


Route::middleware('auth')->group(function () {
    Route::post('/cart/add/{product}', [CartController::class, 'add'])->name('cart.add');
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/cart/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
});

Route::get('faqs', [FaqController::class, 'showFAQs'])->name('show.faq');
Route::post('add-faqs', [FaqController::class, 'storeFAQs'])->name('store.faq');
Route::get('faqs-list', [FaqController::class, 'showFAQsList'])->name('faq-list');
Route::get('faqs-list/delete/{id}', [FaqController::class, 'DeleteFaq'])->name('delete.faq');
Route::get('/faqs-list/edit/{id}', [FAQController::class, 'edit'])->name('edit.faq');
Route::put('/faqs-list/update/{id}', [FaqController::class, 'UpdateFaq'])->name('update.faq');


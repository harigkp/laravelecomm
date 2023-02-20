<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminPagesController;
use App\Http\Controllers\AdminProductController;

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


Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/contact', [PagesController::class, 'contact'])->name('contact');

Route::get('/products', [PagesController::class, 'products'])->name('products');





// Admin Routes


Route::prefix('admin')->namespace(AdminPagesController)->group(function(){
  
  Route::get('/', [AdminPagesController::class, 'index'])->name('admin.index');
  


// Product Rputes
   Route::group(['prefix' => '/products'], function(){
    Route::get('/', [AdminPagesController::class, 'index'])->name('admin.products');	
	Route::get('/create', [AdminPagesController::class, 'create'])->name('admin.product.create');
	Route::get('/edit/{id}', [AdminPagesController::class, 'edit'])->name('admin.product.edit');

	Route::get('/store', [AdminPagesController::class, 'store'])->name('admin.product.store');


	Route::get('/product/edit/{id}', [AdminPagesController::class, 'update'])->name('admin.product.update');
	Route::get('/product/delete/{id}', [AdminPagesController::class, 'delete'])->name('admin.product.delete');

  }); 


});

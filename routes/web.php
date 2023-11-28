<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\ProducerController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Site\GeneralController;
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

// Route::get('main', function () {
//     return view('welcome')->name('main');
// });

Route::controller(GeneralController::class)->group(function(){
    Route::get('/', 'index')->name('main');
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::middleware('isAdmin')->group(function () {
        Route::prefix('admin')->group(function(){
            Route::get('/', function () {
                return view('dashboard');
            })->middleware(['auth', 'verified'])->name('admin');
            
            Route::controller(ProducerController::class)->group(function(){
                Route::get('/producers','index')->name('producers');
                Route::get('/producer/create','create')->name('producerCreate');
                Route::post('/producer/store','store')->name('producerStore');
                Route::get('/producer/edit/{id}','edit')->name('producerEdit');
                Route::get('/producer/show/{id}','show')->name('producerShow');
                Route::patch('/producer/update','update')->name('producerUpdate');
                Route::delete('/producer/delete','delete')->name('producerDelete');
                Route::get('/producer/deleted','deleted')->name('producerShowDeleted');
                Route::patch('/producer/restore','restore')->name('producerRestore');
                Route::delete('/producer/destroy','destroy')->name('producerDestroy');
            });
        
            Route::controller(CategoryController::class)->group(function(){
                Route::get('/categories','index')->name('categories');
                Route::get('/category/create','create')->name('categoryCreate');
                Route::post('/category/store','store')->name('categoryStore');
                Route::get('/category/edit/{id}','edit')->name('categoryEdit');
                Route::get('/category/show/{id}','show')->name('categoryShow');
                Route::patch('/category/update','update')->name('categoryUpdate');
                Route::delete('/category/delete','delete')->name('categoryDelete');
                Route::get('/category/deleted','deleted')->name('categoryShowDeleted');
                Route::patch('/category/restore','restore')->name('categoryRestore');
                Route::delete('/category/destroy','destroy')->name('categoryDestroy');
            });
        });
    });
});


require __DIR__.'/auth.php';

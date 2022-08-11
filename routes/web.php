<?php

use App\Http\Controllers\RouteController;
use App\Http\Controllers\UserManageController;
use App\Http\Controllers\AddCakeController;
use App\Http\Controllers\AddListController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->group(function () {

    //เปลี่ยนหน้า
    Route::get('/index', [RouteController::class, 'index'])->name('index');

    Route::get('/usermanage', [UserManageController::class, 'index'])->name('user-manage');
    Route::get('/usermanage/delete/{id}', [UserManageController::class, 'delete']);



    Route::get('/product', [AddCakeController::class, 'index'])->name('product_cake');
    Route::post('/product/add', [AddCakeController::class, 'store'])->name('product_cake_add');
    Route::get('/product/delete/{id}', [AddCakeController::class, 'delete']);
    Route::post('/product/update/{id}', [AddCakeController::class, 'update']);


    Route::get('/addcakeuser/', [AddListController::class, 'index'])->name('add-list');


});

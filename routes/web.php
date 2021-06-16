<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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

Route::get('/admin',[AdminController::class,'category']);

Route::post('/admin/add_new_category', [AdminController::class, 'add_new_category']);

Route::get('/admin/delete_category/{id}', [AdminController::class, 'delete_category']);

Route::get('/admin/edit_category/{id}', [AdminController::class, 'edit_category']);

Route::post('/admin/update_category', [AdminController::class, 'update_category']);

Route::get('/admin/category_status/{id}', [AdminController::class, 'category_status_update']);



Route::get('/admin/products', [AdminController::class, 'products']);

Route::post('/admin/add_new_product', [AdminController::class, 'add_new_product']);

Route::get('/admin/product_status/{id}', [AdminController::class, 'product_status_update']);

Route::get('/admin/delete_product/{id}', [AdminController::class, 'delete_product']);

Route::get('/admin/edit_product/{id}', [AdminController::class, 'edit_product']);

Route::post('/admin/update_product', [AdminController::class, 'update_product']);

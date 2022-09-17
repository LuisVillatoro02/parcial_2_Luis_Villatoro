<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
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
//Category Routes
Route::get('Category/index',[CategoryController::Class, 'index'])->name('categories.index');
Route::get('Category/Registrar',[CategoryController::Class, 'create'])->name('categories.create'); 
Route::post('Category/Store',[CategoryController::Class, 'store'])->name('categories.store'); 
Route::get('Category/Edit/{id}',[CategoryController::Class, 'edit'])->name('categories.edit'); 
Route::PUT('Category/Update/{id}',[CategoryController::Class, 'update'])->name('categories.update'); 
Route::get('Category/Show/{id}',[CategoryController::Class, 'show'])->name('categories.show'); 
Route::DELETE('Category/Destroy/{id}',[CategoryController::Class, 'destroy'])->name('categories.destroy'); 

//Customers Routes
Route::get('Customer/index',[CustomerController::Class, 'index'])->name('customers.index');
Route::get('Customer/Registrar',[CustomerController::Class, 'create'])->name('customers.create'); 
Route::post('Customer/Store',[CustomerController::Class, 'store'])->name('customers.store'); 
Route::get('Customer/Edit/{id}',[CustomerController::Class, 'edit'])->name('customers.edit'); 
Route::PUT('Customer/Update/{id}',[CustomerController::Class, 'update'])->name('customers.update'); 
Route::get('Customer/Show/{id}',[CustomerController::Class, 'show'])->name('customers.show'); 
Route::DELETE('Customer/Destroy/{id}',[CustomerController::Class, 'destroy'])->name('customers.destroy'); 
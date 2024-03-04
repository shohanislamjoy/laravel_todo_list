<?php

use App\Http\Controllers\todo_list_controller;
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

Route::post('saved_item', [todo_list_controller::class, 'saved_item'])->name('saved_item');
Route::delete('delete_item/{id}', [todo_list_controller::class, 'delete_item'])->name('delete_item');
Route::post('complete_item/{id}', [todo_list_controller::class, 'complete_item'])->name('complete_item');
Route::get('/', [todo_list_controller::class, 'index'])->name('index');

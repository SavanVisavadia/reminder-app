<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReminderController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/createReminder', [App\Http\Controllers\ReminderController::class, 'create'])->name('create');
Route::get('/editReminder/{id}', [App\Http\Controllers\ReminderController::class, 'edit'])->name('edit');
Route::get('/deleteReminder', [App\Http\Controllers\ReminderController::class, 'delete'])->name('delete');
Route::post('/storeReminder', [App\Http\Controllers\ReminderController::class, 'store'])->name('store');
Route::post('/updateReminder', [App\Http\Controllers\ReminderController::class, 'update'])->name('update');
Route::any('/deleteReminder/{id}', [App\Http\Controllers\ReminderController::class, 'destroy'])->name('delete');
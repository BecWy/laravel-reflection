<?php

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
    return redirect('/login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';


//MY ROUTES

//Companies page
Route::get('/companies', function () {
    return view('companies');
})->middleware(['auth'])->name('dashboard');


//Employees page
Route::get('/employees', function () {
    return view('employees');
})->middleware(['auth'])->name('dashboard');

//redirect the register page to the login page(don't want to delete this in case I want to add this functionality another time)
Route::get('/register', function () {
    return redirect('/login');
});
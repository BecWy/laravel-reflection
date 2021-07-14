<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;

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


//COMPANIES ROUTES

//Companies - index - display the page with all companies //WORKS
//Have to include the controller in order to run the index function inside this which returns the view.
Route::get('companies', [CompanyController::class, 'index'])->middleware(['auth'])->name('companies');


//Companies - show
//only need this if I want to display one individual company.



//Add a new company
//Companies - create - display the form to create a new company
Route::get('companies/create', [CompanyController::class, 'create']); //WORKS - goes to the companies create blade file (currently empty) 

//Companies - store
Route::post('companies/create', [CompanyController::class, 'store']);
//->middleware(['auth'])->name('companies');



//Edit an existing company
//Companies - edit - display the edit form
Route::get('companies/{company:id}/edit', [CompanyController::class, 'edit']); //WORKS - goes to the companies edit blade file (currently empty)

//Companies - update - save the changes from the edit
Route::post('companies/{company:id}/edit', [CompanyController::class, 'update']);


//Companies - destroy.
//Takes you to a delete popup
Route::get('companies/{company:id}/delete', [CompanyController::class, 'delete']);

//deletes the record - this does work
Route::post('companies/{company:id}/destroy', [CompanyController::class, 'destroy']);

//deletes the record - DOESN'T DO ANYTHING
//Route::delete('companies/{company:id}/delete', [CompanyController::class, 'destroy']);

//Route::get('companies/destroy', [CompanyController::class, 'destroy']);
//->middleware(['auth'])->name('companies');
//Route::post('companies/destroy', [CompanyController::class, 'destroy']);






//NEED TO UPDATE THIS SO THAT IT'S LIKE THE COMPANIES ROUTE
//Employees page
Route::get('/employees', function () {
    return view('employees');
})->middleware(['auth'])->name('employees');


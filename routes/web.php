<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;


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


//////////////////////////////////////////////////////////////////////////////////////////////////////
//COMPANIES ROUTES
///////////////////////////////////////////////////////////////////////////////////////////////////////

Route::group(['middleware' => 'auth'], function () {


    //Companies - index - display the page with all companies
    //Have to include the controller in order to run the index function inside this which returns the view.
    Route::get('/companies', [CompanyController::class, 'index'])->name('companies');


    //Companies - show
    //only need this if I want to display one individual company.


    //Add a new company
    //Companies - create - display the form to create a new company
    Route::get('/companies/create', [CompanyController::class, 'create'])->name('companies.create'); 

    //Companies - store
    Route::post('/companies/create', [CompanyController::class, 'store'])->name('companies.store');


    //Edit an existing company
    //Companies - edit - display the edit form
    //Route::get('companies/{company:id}/edit', [CompanyController::class, 'edit'])->name('companies.edit'); 
    Route::get('/companies/{id}/edit', [CompanyController::class, 'edit'])->name('companies.edit'); 

    //Companies - update - save the changes from the edit
    Route::post('/companies/{id}/edit', [CompanyController::class, 'update'])->name('companies.update');


    //Companies - destroy.
    //Takes you to a delete popup
    Route::get('/companies/{id}/delete', [CompanyController::class, 'delete'])->name('companies.delete');

    //deletes the record 
    Route::post('/companies/{id}/delete', [CompanyController::class, 'destroy'])->name('companies.destroy');

});


//////////////////////////////////////////////////////////////////////////////////////////////////////
//EMPLOYEES ROUTES
///////////////////////////////////////////////////////////////////////////////////////////////////////

Route::group(['middleware' => 'auth'], function () {
    //Employees - index - display the page with all employees
    //Have to include the controller in order to run the index function inside this which returns the view.
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees');


    //Employees - show
    //only need this if I want to display one individual company.


    //Add a new employee
    //Employees - create - display the form to create a new employee
    Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');  

    //Employees - store
    Route::post('/employees/create', [EmployeeController::class, 'store'])->name('employees.store');


    //Edit an existing employee
    //Employees - edit - display the edit form
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');

    //Employees - update - save the changes from the edit
    Route::post('/employees/{id}/edit', [EmployeeController::class, 'update'])->name('employees.update');


    //Employees - destroy.
    //Takes you to a delete popup
    Route::get('/employees/{id}/delete', [EmployeeController::class, 'delete'])->name('employees.delete');

    //deletes the record 
    Route::post('/employees/{id}/destroy', [EmployeeController::class, 'destroy'])->name('employees.destroy');

});
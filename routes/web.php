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

//Companies - index - display the page with all companies
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

//Companies - delete a logo on the edit page
//Route::post('companies/{company:id}/edit', [CompanyController::class, 'destroyLogo'])->name('companies.destroyLogo');


//Companies - destroy.
//Takes you to a delete popup
Route::get('companies/{company:id}/delete', [CompanyController::class, 'delete']);

//deletes the record 
Route::post('companies/{company:id}/destroy', [CompanyController::class, 'destroy']);





//////////////////////////////////////////////////////////////////////////////////////////////////////
//EMPLOYEES ROUTES
///////////////////////////////////////////////////////////////////////////////////////////////////////

//Employees - index - display the page with all employees
//Have to include the controller in order to run the index function inside this which returns the view.
Route::get('employees', [EmployeeController::class, 'index'])->middleware(['auth'])->name('employees');


//Employees - show
//only need this if I want to display one individual company.


//Add a new employee
//Employees - create - display the form to create a new employee
Route::get('employees/create', [EmployeeController::class, 'create']);  

//Employees - store
Route::post('employees/create', [EmployeeController::class, 'store']);
//->middleware(['auth'])->name('employees');


//Edit an existing employee
//Employees - edit - display the edit form
Route::get('employees/{employee:id}/edit', [EmployeeController::class, 'edit']);

//Employees - update - save the changes from the edit
Route::post('employees/{employee:id}/edit', [EmployeeController::class, 'update']);


//Employees - destroy.
//Takes you to a delete popup
Route::get('employees/{employee:id}/delete', [EmployeeController::class, 'delete']);

//deletes the record 
Route::post('employees/{employee:id}/destroy', [EmployeeController::class, 'destroy']);


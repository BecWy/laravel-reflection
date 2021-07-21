<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //needed for pagination
use Illuminate\Support\Facades\File; //needed to delete a file
use Illuminate\Support\Str; //to use string helpers like to lower, uc words etc.
//use App\Rules\DomainName; //to use this custom validation rule



class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index()
    {
        return view('employees.index', [
            'employees' => Employee::orderby('last_name')->paginate(10)
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //1. Validate Data
        $request->validate([
            'first_name' => ['required', 'unique:employees,first_name', 'max:100'], //made it max 100 to stop it being too long.
            'last_name' => ['required', 'unique:employees,last_name', 'max:100'], //made it max 100 to stop it being too long.
            //need to add company name here
            'email' => ['nullable', 'unique:employees,email', 'email', 'max:100'], //made it max 100 to stop it being too long.
            //may need to create my own phone validation rule???
            'phone' => ['nullable', 'unique:employees,phone', 'max:100']
            
        ]);

        //2. sanitise and format input before it is saved
        $first_name = Str::lower($request->first_name);
        $first_name = trim(strip_tags(ucwords($first_name)));
        
        $last_name = Str::lower($request->last_name);
        $last_name = trim(strip_tags(ucwords($last_name)));
        
        $company = Str::lower($request->company);
        $company = trim(strip_tags(ucwords($company)));

        $email = trim(strip_tags(Str::lower($request->email)));
        
        //need to look into this and update it
        $phone = $request->phone;

        //3. create employee
        $newEmployee = Employee::create($request->all());
        
        $newEmployee->first_name = $first_name;
        $newEmployee->last_name = $last_name;

        if($newEmployee->email) {
            $newEmployee->email = $email;
        }

        if($newEmployee->company) {
            $newEmployee->company = $company;
        }

        if($newEmployee->phone) {
            $newEmployee->phone = $phone;
        }

        $newEmployee->save();

        //4. Redirect to the companies page & display a flash message.
        return redirect()->route('employees')
            ->with('success','Employee created successfully'); 
        //the above route is named 'employees' so I don't need to write 'employees.index'

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //you would use this to show ONE employee. Not needed for this project at the moment.
        return view('employees.show',compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        //display the edit form. Compact is necessary here -it won't work without it.
        return view('employees.edit',compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        //1. Validate Data
        $request->validate([
            'first_name' => ['required', 'unique:employees,first_name', 'max:100'], //made it max 100 to stop it being too long.
            'last_name' => ['required', 'unique:employees,last_name', 'max:100'], //made it max 100 to stop it being too long.
            //need to add company name here
            'email' => ['nullable', 'unique:employees,email', 'email', 'max:100'], //made it max 100 to stop it being too long.
            //may need to create my own phone validation rule???
            'phone' => ['nullable', 'unique:employees,phone', 'max:100']
        
        ]);

        //2. Update the fields that have been changed
        //update the name if this has changed
        if($request->first_name) {
            $first_name = Str::lower($request->first_name);
            $first_name = trim(strip_tags(ucwords($name)));
            $employee->first_name = $first_name;
        }

        if($request->last_name) {
            $last_name = Str::lower($request->last_name);
            $last_name = trim(strip_tags(ucwords($last_name)));
            $employee->last_name = $last_name;
        }

        //update the company name if this has changed
        if($request->company) {
            $company = Str::lower($request->company);
            $company = trim(strip_tags(ucwords($company)));
            $employee->company = $company;
        }

        //update the email if this has changed
        if($request->email) {
            $email = trim(strip_tags(Str::lower($request->email)));
            $employee->email = $email;
        }

        //update the phone if this has changed. NEED TO ADD VALIDATION
        if($request->phone) {
            $phone = $request->phone;
            $employee->phone = $phone;
        }

        //3. save the new details
        $employee->update();

        //4. Redirect to the companies page & display a flash message.
        return redirect()->route('employees')
            ->with('success','Employee updated successfully'); 
        //the above routed is named 'employees' so I don't need to write 'employees.index'


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Employee  $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();

        return redirect()->route('employees')
           ->with('success','Employee deleted successfully');
    }


    ////////////////////////////////////////////////////////////////////////////////////////////
    //Other methods ////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////

    //takes you to the delete blade file
    public function delete(Employee $employee)
    {
        return view('employees.delete',compact('employee'));
    }
}

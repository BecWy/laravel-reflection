<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //I added this to try and fix pagination
use Illuminate\Support\Facades\DB; //I added this to try and fix pagination


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {       
        return view('companies.index', [
            'companies' => DB::table('companies')->paginate(10)
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // this needs to return a create new company view
        //ah this companies.create business reflects the file structure I think?
        //Do i need to create a companies folder, with each of these files saved within it???????
        //TRY THE ABOVE
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //VALIDATION GOES IN THIS METHOD
        $request->validate([
            //need to add all of the correct columns
            'name' => 'required',
            'email' => 'required',
        ]);

        Company::create($request->all());
     
        return redirect()->route('companies.index')
                        ->with('success','Company created successfully.'
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //you would use this to show ONE company
        //not sure what compact does - google
        return view('companies.show',compact('company.'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        //display the edit form.
        return view('companies.edit',compact('company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        //NEED VALIDATION HERE, changes are persisted here as well as in store
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);
    
        $company->update($request->all());
    
        return redirect()->route('companies.index')
                        ->with('success','Company updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        //VALIDATE THE REQUEST?????????????????? Maybe add an are you sure? popup
        $company->delete();
    
        return redirect()->route('companies.index')
                        ->with('success','Company deleted successfully');
    }
}

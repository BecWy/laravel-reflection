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
            'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

     
        //////WORKING FILE SAVING////
        //Using the original file name for now. May return to working on a way to use the company name later.
        $request->file('logo')->storeAs('logos/', $request->logo->getClientOriginalName()); //saved with the original file name
       
        //Saves as the company name. but needs to remove spaces and add the file extension
        //$request->file('logo')->storeAs('logos/', $request->name); //this line works
            //try adding this: $request->file->extension(); 


        //Creating the new company and storing the logo file location to the database
        $fileName = $request->logo->getClientOriginalName();
        
        $filePath = 'logos/' . $fileName;
        //$filePath = '/app/public/logos/' . $fileName;
        $newCompany = Company::create($request->all());
        $newCompany->logo = $filePath;
        $newCompany->save();


        //for adding validation later
        // if ($request->file('logo')->isValid()) {
        //     //
        // }
        
        
        //THIS WORKS, just trying to create a better version
        //Company::create($request->all());
      
        return redirect()->route('companies')
            ->with('success','Company updated successfully'); //this bit's not working, need to read flash message notes
        //the above route is named 'companies' so I don't need to write 'companies.index'
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        //you would use this to show ONE company. Not needed for this project at the moment.
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
        //display the edit form. Compact is necessary here -it won't work without it.
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
        //when this doesn't work don't forget to look for mass assignment issues, protected guarded etc
        //also form field names have to match the column names
        
        //NEED VALIDATION HERE, changes are persisted here as well as in store
        $request->validate([
            'name' => 'required',
        ]);
    
        $company->update($request->all());
        return redirect()->route('companies')
            ->with('success','Company updated successfully'); //this bit's not working, need to read flash message notes
        //the above routed is named 'companies' so I don't need to write 'companies.index'
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
    
        return redirect()->route('companies')
            ->with('success','Company deleted successfully');
    }

    //takes you to the delete blade file
    public function delete(Company $company)
    {
        return view('companies.delete',compact('company'));
    }

    //retrieve the logo
    public function getLogoAttribute()
    {
        return $this->logo;
    }

    public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : Str::random(25);

        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

        return $file;
    }


}

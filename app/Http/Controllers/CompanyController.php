<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB; //needed for pagination
use Illuminate\Support\Facades\File; //needed to delete a file
use Illuminate\Support\Str; //to use string helpers like to lower, uc words etc.
use App\Rules\DomainName; //to use this custom validation rule
use App\Rules\FileUnique; //to use this custom validation rule


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    


    // public function index()
    // {
    //     return view('companies.index', [
    //         'companies' => Company::orderby('name')->paginate(10)
    //     ]);
    // }

    public function index(Request $request)
    {
        $request->flash;

        return view('companies.index', [
            'companies' => Company::orderby('name')->filter(
                request(['search'])
            )->paginate(10)->withQueryString()
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
        //1. Validate Data 'unique:companies,name,'.$company->id,
        $request->validate([
            'name' => ['required', 'unique:companies,name,'.$request->id, 'max:100'], //made it max 100 to stop it being too long.
            'email' => ['nullable', 'unique:companies,email,'.$request->id, 'email', 'max:100'], //made it max 100 to stop it being too long.
            'logo' => ['required', 'mimes:jpeg,png,jpg,gif', 'unique:companies,logo,'.$request->id, 'dimensions:min_width=100,min_height=100', 'image', new FileUnique],
            'website' => ['nullable', 'unique:companies,website,'.$request->id, 'max:100', new DomainName],
        ]);
 

        //2. Save the uploaded file
        //Using the original file name for now. May return to working on a way to use the company name later.
        if($request->logo) {
            $request->file('logo')->storeAs('logos/', $request->logo->getClientOriginalName()); //saved with the original file name
        
        //Saves as the company name. but would need to update this to remove spaces and add the file extension
        //$request->file('logo')->storeAs('logos/', $request->name); //this line works //try adding this: $request->file->extension(); 

        //3. Store the logo file location to the database.
            $fileName = $request->logo->getClientOriginalName();
            $filePath = 'logos/' . $fileName;
        }

        //4. sanitise and format input before it is saved
        $name = trim(strip_tags(ucwords($request->name)));
        $email = trim(strip_tags(Str::lower($request->email)));
        $website = str_replace("www.", " ", $request->website);
        $website = trim(strip_tags(Str::lower($website)));

        //5. create company
        $newCompany = Company::create($request->all());
        
        $newCompany->name = $name;

        if($newCompany->email) {
            $newCompany->email = $email;
        }

        if($newCompany->logo) {
            $newCompany->logo = $filePath;
        }

        if($newCompany->website) {
            $newCompany->website = $website;
        }

        $newCompany->save();

        //6. Redirect to the companies page & display a flash message.
        return redirect()->route('companies')
            ->with('success','Company created successfully'); 
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
        return view('companies.show',compact('company'));
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
        $request->website = Str::lower($request->website);


        //1. Validate Data. Have to add $company->id to unique so that the currently saved data for that company is still permitted.
        $request->validate([
            'name' => ['required', 'unique:companies,name,'.$company->id, 'max:100'], //made it max 100 to stop it being too long.
            'email' => ['nullable', 'unique:companies,email,'.$company->id, 'email', 'max:100'], //made it max 100 to stop it being too long.
            'logo' => ['nullable', 'file', 'mimes:jpeg,png,jpg,gif', 'unique:companies,logo,'.$company->id, 'dimensions:min_width=100,min_height=100', 'image', new FileUnique],
            'website' => ['nullable', 'unique:companies,website,'.$company->id, 'max:100', new DomainName],
        ]);

     
        //2. If logo file has changed then update the filepath, delete the old file (if this exists), and save the new file
        //need to make sure that the filename is unique before deleting the original file.
        if($request->logo) {
            $fileName = $request->logo->getClientOriginalName();
            $filePath = 'logos/' . $fileName;
            
            if($filePath !== $company->logo) {
                if(File::exists($company->logo)) {
                    File::delete($company->logo);
                }

                //update the logo file path
                $request->file('logo')->storeAs('logos/', $fileName); //saved with the original file name
                $company->logo = $filePath;
            }
        }

        //update the name if this has changed
        if($request->name) {
            $name = trim(strip_tags(ucwords($request->name)));
            $company->name = $name;
        }

        //update the email if this has changed
        if($request->email) {
            $email = trim(strip_tags(Str::lower($request->email)));
            $company->email = $email;
        }

        //update the website if this has changed
        if($request->website) {
            $website = str_replace("www.", " ", $request->website);
            $website = trim(strip_tags(Str::lower($website)));
            $company->website = $website;
        }


        //save the new details
        $company->update();

        //Redirect to the companies page & display a flash message.
        // return redirect()->route('companies')
        //     ->with('success','Company updated successfully'); 
        //the above route is named 'companies' so I don't need to write 'companies.index'

        return redirect()->route('companies')
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
        //VALIDATE THE REQUEST??????????????????
        
        //delete the logo file from public/logos
        if(File::exists($company->logo)) {
            File::delete($company->logo);
        }
        
        $company->delete();

        return redirect()->route('companies')
           ->with('success','Company deleted successfully');
    }


    ////////////////////////////////////////////////////////////////////////////////////////////
    //Other methods ////////////////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////////////////////////////////

    //takes you to the delete blade file
    public function delete(Company $company)
    {
        return view('companies.delete',compact('company'));
    }


}

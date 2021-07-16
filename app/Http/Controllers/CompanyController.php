<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller; //I added this to try and fix pagination
use Illuminate\Support\Facades\DB; //I added this to try and fix pagination
use Illuminate\Support\Facades\File; //needed to delete a file


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
            'companies' => DB::table('companies')->orderby('name')->paginate(10)
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
        //1. Validate Data
        $validated = $request->validate([
            'name' => ['required', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'logo' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif', 'min:100', 'max:2048'],
            'website' => ['nullable', 'url']
        ]);

        //2. Save the uploaded file (if this exists)
        //Using the original file name for now. May return to working on a way to use the company name later.
        if($request->logo) {
            $request->file('logo')->storeAs('logos/', $request->logo->getClientOriginalName()); //saved with the original file name
        
        //Saves as the company name. but would need to update this to remove spaces and add the file extension
        //$request->file('logo')->storeAs('logos/', $request->name); //this line works //try adding this: $request->file->extension(); 

        //3. Create the new company. As part of this store the logo file location to the database.
            $fileName = $request->logo->getClientOriginalName();
            $filePath = 'logos/' . $fileName;
        }

        $newCompany = Company::create($request->all());

        if($request->logo) {
            $newCompany->logo = $filePath;
        }

        $newCompany->save();

        //4. Redirect to the companies page.
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

        //if logo file has changed update the filepath, delete the old file (if this exists), and save the new file
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
            $company->name = $request->name;

        //update the email if this has changed
            $company->email = $request->email;

        //update the website if this has changed
            $company->website = $request->website;

        $company->save();
        $company->update();

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



    //retrieve the logo
    // public function getLogoAttribute()
    // {
    //     return $this->logo;
    // }

    //upload a logo
    // public function uploadOne(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    // {
    //     $name = !is_null($filename) ? $filename : Str::random(25);

    //     $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);

    //     return $file;
    // }

    //delete a logo - NOT WORKING. need an image controller???????????
    // public function destroyLogo(Request $request)
    // {
    //     if(File::exists('logos/' . $request->logo )) {
    //         File::delete('logos/' . $request->logo);
    //     }
    //     // else{
    //     //     dd('File does not exists.');
    //     // }

    //     //update the logo file path to null
    //     $company->logo = null;
    //     $company->save();
    //     $company->update();
    // }

}

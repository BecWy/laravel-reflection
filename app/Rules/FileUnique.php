<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class FileUnique implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $fileName = $value->getClientOriginalName();
        $filePath = 'logos/' . $fileName;
        
        
        if(File::exists($filePath)) {
            return false;
        } else {
            return true;
        }
        
        //$url = Storage::url($filename);
        //$url = Storage::url('test-logo-1');
        
        // if ($url != null ) {
        //     return false;
        // } else {
        //     return true;
        // }
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'A file with that name already exists. Please upload a file with a different name.';
    }
}

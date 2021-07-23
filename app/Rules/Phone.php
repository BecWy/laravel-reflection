<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class Phone implements Rule
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
        return preg_match(
            
             //test regex to make sure the rule is working. This allows a space, but not brackets or +
            //"/(\s*\(?0\d{4}\)?(\s*|-)\d{3}(\s*|-)\d{3}\s*)|(\s*\(?0\d{3}\)?(\s*|-)\d{3}(\s*|-)\d{4}\s*)|(\s*(7|8)(\d{7}|\d{3}(\-|\s{1})\d{4})\s*)/", $value
        
            //allows spaces and brackets, but not +
            //"/(((\+44)? ?(\(0\))? ?)|(0))( ?[0-9]{3,4}){3}/", $value
        
            //best so far, allows +44, but when I used this I had to remove the brackets. Allows spaces too.
            "/(\(?\+44\)?\s?(1|2|3|7|8)\d{3}|\(?(01|02|03|07|08)\d{3}\)?)\s?\d{3}\s?\d{3}|(\(?\+44\)?\s?(1|2|3|5|7|8)\d{2}|\(?(01|02|03|05|07|08)\d{2}\)?)\s?\d{3}\s?\d{4}|(\(?\+44\)?\s?(5|9)\d{2}|\(?(05|09)\d{2}\)?)\s?\d{3}\s?\d{3}/", $value
        );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Please provide a valid phone number';
    }
}

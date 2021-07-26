<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }


    public function scopeFilter($query, array $filters)
    {
        if(request('company')) {
            $query->where('employees.company_id', '=', request('company'));
        }
        return $query;
        
        
        // $query
        //     ->whereExists(fn($query) => 
        //         $query->from('companies')
        //             ->whereColumn('companies.id', 'employees.company_id')
        //             //->where('companies.id', $company)
        // );
        
        
       
        
        //when we have a search filter, then trigger this function
        // $query->when($filters['search'] ?? false, fn ($query, $search) => 
        //     $query->where(fn($query) =>
        //         $query->where('title', 'like', '%' . $search . '%')
        //         ->orWhere('body', 'like', '%' . $search . '%')
        //     )
        // ); 

        // $query->when($filters['company_filter'] ?? false, fn ($query, $company) => 
        //     $query->where('company_id', $company->id)
        // );

        // $query->when($filters['company'] ?? false, fn ($query, $company) => 
        //     $query->whereHas('company', fn ($query) => 
        //         $query->where('id', $company)
        //     )
        // );

    }
}



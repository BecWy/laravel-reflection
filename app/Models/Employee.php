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
        $queryBuilder = null;
        
        if(request('company')) {
            $query->where('employees.company_id', '=', request('company'));
        }

        if(request('search')) {
            $query->where('employees.first_name', 'like', '%' . request('search') . '%')
            ->orWhere('employees.last_name', 'like', '%' . request('search') . '%')
            ->orWhere('employees.email', 'like', '%' . request('search') . '%')
            ->orWhere('employees.phone', 'like', '%' . request('search') . '%');
        }

        return $query;

    }
}



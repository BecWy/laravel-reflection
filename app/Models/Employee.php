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

    }
}



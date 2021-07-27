<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }


    public function scopeFilter($query, array $filters)
    {
        //$queryBuilder = null;

        if(request('search')) {
            $query->where('companies.name', 'like', '%' . request('search') . '%')
            ->orWhere('companies.email', 'like', '%' . request('search') . '%')
            ->orWhere('companies.website', 'like', '%' . request('search') . '%');
        }

        return $query;

    }
}

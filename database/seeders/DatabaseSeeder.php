<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\User;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::factory(1)->create(['name' => 'Test Admin', 'email' => 'admin@admin.com']);
        
        Employee::factory(11)->create();

        //create one company with lots of employees
        $company = Company::factory()->create([
            'name' => 'A company with lots of employees',
        ]);

        Employee::factory(22)->create([
            'company_id' => $company->id
        ]);
    }
}

<?php
use App\Models\Company;
use App\Models\Employee;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
?>

<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Employees') }}
        </h2>
    </x-slot>


    <div class="mx-auto m-w-full">
        <div>
            <form method="GET" action="{{ route('employees') }}">
                <select
                    id="company" 
                    name="company" 
                    class="w-5/12 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"                  
                    value = "{{ old('company_id') ? old('company_id') : null }}"
                    >
                        @foreach($companies as $company)
                            <option value="{{$company->id}}"
                                @if (request()->query('company') == $company->id)
                                    selected="selected"
                                @endif
                            >{{$company->name}}</option>
                        @endforeach
                </select>

                <button type="submit" id="submit-button" class="text-white text-sm bg-indigo-800 font-bold uppercase w-1/12 h-full py-3 mr-2"> 
                    Filter
                </button>

            </form>
        </div>
    
    
        <div class="flex flex-row items-end justify-end">
            <a href="/employees/create" class="text-3xl cursor-pointer text-indigo-800" p-1><i class="far fa-plus-square"></i></a>
        </div>

        <div class="overflow-x-auto md:overflow-x-hidden w-full mb-4 mt-2">

        <?php
        // @if(!$employees->count())
        //     <p>There are no employees saved.</p>
        // @else
        ?>

            <table class="my-4 py-4 bg-white m-w-full w-full">
                <tr>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2"></th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">First Name</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Last Name</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Company</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Email</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Phone</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Actions</th>
                </tr>
                

                <?php
                $id = 0;
                ?> 


                @foreach ($employees as $employee)
    
                    <?php
                    $id += 1;
                    $currentPage =  request()->get('page');

                    if($currentPage) {
                        $offset = ($currentPage - 1) * 10;
                    } else {
                        $offset = 0;
                    }
                    
                    $calculatedID = $id + $offset; 
                    ?>
                    
                    <tr>
                        <td class="border px-4 py-2 align-top text-sm">{{$calculatedID}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$employee->first_name}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$employee->last_name}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$employee->company->name ?? ''}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$employee->email;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$employee->phone;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">
                            <a href="/employees/{{$employee->id}}/edit" class="pr-2 cursor-pointer"><i class="far fa-edit"></i></a>
                            <a href="/employees/{{$employee->id}}/delete" class="cursor-pointer"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>

                @endforeach       
            </table>

        </div>

        
        @if($employees->count())
            {{ $employees->links() }}
        @else   
            <p>There are no employees saved.</p>
        @endif
        

    <!-- if the white strip reappears at the bottom of this page check the min height settings again -->
    </div>
    <br>

</x-app-layout>



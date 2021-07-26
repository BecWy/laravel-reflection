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



    <div class="mx-auto m-w-full w-full">
        
        <div class="m-w-full w-full flex flex-wrap flex-col lg:flex-row lg:items-center lg:justify-start my-4">
    
            <form method="GET" action="{{ route('employees') }}" class="h-10 sm:w-full sm:max-w-full md:w-7/12 lg:w-5/12 flex items-center justify between">
                <select
                    id="company" 
                    name="company" 
                    class="h-full w-full sm:max-w-400 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"                  
                    value = "{{ old('company_id') ? old('company_id') : null }}"
                    >
                        <option selected="true" value="">All Companies</option>
                        @foreach($companies as $company)
                            <option value="{{$company->id}}"
                                @if (request()->query('company') == $company->id)
                                    selected="selected"
                                @endif
                            >{{$company->name}}</option>
                        @endforeach
                </select>

                <button type="submit" id="submit-button" class="text-white text-xs tracking-wider bg-indigo-800 font-bold uppercase w-20 h-full py-3 ml-1 lg:mr-4 rounded-md"> 
                    Filter
                </button>

            </form>

            <form method="GET" action="{{ route('employees') }}" class="h-10 sm:w-full sm:max-w-full md:w-7/12 lg:w-5/12 mt-4 lg:mt-0 flex items-center">
                <input type="text" 
                    id="search" 
                    name="search" 
                    class="h-full w-full sm:max-w-300 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  
                    value="{{ request()->query('search') }}"                 
                >

                <button type="submit" id="search-button" class="text-white text-xs tracking-wider bg-indigo-800 font-bold uppercase w-20 h-full py-3 ml-1 rounded-md"> 
                    Search
                </button>

            </form>
        
            <!-- container for icon links -->
            <div class="mt-4 lg:mt-0 lg:ml-auto">
               <a href="/employees/create" class="text-4xl cursor-pointer text-indigo-800 h-full" p-1><i class="far fa-plus-square"></i></a>
            </div>

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
                        <td class="border px-4 py-2 align-top text-sm md:break-all lg:break-normal">{{$employee->email;}}</td>
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



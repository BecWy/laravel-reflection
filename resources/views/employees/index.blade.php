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
        <div class="flex flex-row items-end justify-end">
            <a href="/employees/create" class="text-3xl cursor-pointer text-indigo-900" p-1><i class="far fa-plus-square"></i></a>
        </div>

        <div class="overflow-x-auto md:overflow-x-hidden w-full mb-4 mt-2">

        <?php
        // @if(!$employees->count())
        //     <p>There are no employees saved.</p>
        // @else
        ?>



        <!-- /////////////////////////////////////////////////////////////////////
        //EXPERIMENT - WORKING OUT HOW TO DISPLAY THE COMPANY NAMES IN A DROPDOWN ON CREATE/EDIT
        //THIS BIT IS WORKING OUT HOW TO GET EACH ONE IN A LIST, ONCE PER COMPANY -->
        <!-- //the array creation and sorting is working!!!!!!!!!!!!! -->
        <ul>
        <?php
        $companyList = [];
        ?>
        @foreach($employees as $employee)
            
            
            @if(!in_array($employee->company->name, $companyList))
                
                <?php
                    $companyList[] = $employee->company->name;
                    //echo $companyList;
                ?>
                
                <li>{{$employee->company->name}}</li>
            @endif
           
        @endforeach

            <li>this is after the loop</li>
        </ul>

        <?php
            asort($companyList);
            foreach ($companyList as $company) {
                echo "<li>$company</li>";
            }
        ?>
        <!-- /////////////////////////////////////////////////////////////////////// -->
       
        
        

            <table class="my-4 py-4 bg-white m-w-full w-full">
                <tr>
                    <th class="bg-indigo-900 text-white tracking-wider font-semibold text-left px-4 py-2"></th>
                    <th class="bg-indigo-900 text-white tracking-wider font-semibold text-left px-4 py-2">First Name</th>
                    <th class="bg-indigo-900 text-white tracking-wider font-semibold text-left px-4 py-2">Last Name</th>
                    <th class="bg-indigo-900 text-white tracking-wider font-semibold text-left px-4 py-2">Company</th>
                    <th class="bg-indigo-900 text-white tracking-wider font-semibold text-left px-4 py-2">Email</th>
                    <th class="bg-indigo-900 text-white tracking-wider font-semibold text-left px-4 py-2">Phone</th>
                    <th class="bg-indigo-900 text-white tracking-wider font-semibold text-left px-4 py-2">Actions</th>
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

                        <!-- <td class="border px-4 py-2 align-top text-sm">
                            //<?php
                            
                                //$company = Company::find($employee->company_id);
                            //{{
                                
                                //$company->name;
                            //}}
                            // ?>
                        </td> -->
                        
                        <td class="border px-4 py-2 align-top text-sm">{{$employee->email;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$employee->phone;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">
                            <a href="/employees/{{$employee->id}}/edit" class="pr-2 cursor-pointer"><i class="far fa-edit"></i></a>
                            <a href="/employees/{{$employee->id}}/delete" class="cursor-pointer"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach

               
        
            </table>
        <?php
        //@endif
        ?>
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



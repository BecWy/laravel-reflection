<x-crud-container>

    <x-slot name="title">
        Employees
    </x-slot>

    <x-slot name="arrowlink">
        "/employees"
    </x-slot>


    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Delete Employee</h2>

        @auth
            <form method="POST" 
                    
                    action="/employees/{{$employee->id}}/destroy" 
                    
                    <?php
                    //action="{{ route('companies') }}"
                    ?>

                    class="w-10/12" 
                    enctype="multipart/form-data"> 
                @csrf

                <p>Are you sure you want to delete {{$employee->first_name}} {{$employee->last_name}}?</p>

                <div id="button-div" class="flex flex-row items-center justify-center my-4 mt-8 text-white text-center">
                    <button type="submit" id="submit-button" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 mr-2"> 
                        Delete
                    </button>

                    <a href="/employees" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 ml-2"> 
                        Cancel
                    </a>
                </div>

            </form>
        @endauth


    </x-slot>
</x-crud-container>
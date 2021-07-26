@auth

<x-crud-container>

    <x-slot name="title">
        Employees
    </x-slot>

    <x-slot name="arrowlink">
        "{{ route('employees') }}"
    </x-slot>

    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Delete Employee</h2>

            <form method="POST"   
                    action="/employees/{{$employee->id}}/destroy" 
                    class="w-full" 
                    enctype="multipart/form-data"> 
                @csrf

                <p>Are you sure you want to delete {{$employee->first_name}} {{$employee->last_name}}?</p>

                <div id="button-div" class="flex flex-row items-center justify-center my-4 mt-8 text-white text-center">
                    <button type="submit" id="submit-button" class="bg-indigo-800 font-bold uppercase w-6/12 h-full py-3 mr-2"> 
                        Delete
                    </button>

                    <a href="{{ route('employees') }}" class="bg-indigo-800 font-bold uppercase w-6/12 h-full py-3 ml-2"> 
                        Cancel
                    </a>
                </div>

            </form>
    
    </x-slot>
</x-crud-container>

@endauth
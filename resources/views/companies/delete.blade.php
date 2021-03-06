@auth

<x-crud-container>
    
    <x-slot name="title">
        Companies
    </x-slot>

    <x-slot name="arrowlink">
        "/companies"
    </x-slot>

    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Delete Company</h2>

            <form method="POST" 
                    
                    action="/companies/{{$company->id}}/destroy" 
                    class="w-full" 
                    enctype="multipart/form-data"> 
                @csrf

                <p>Are you sure you want to delete {{$company->name}} and all of its employees?</p>

                <div id="button-div" class="flex flex-row items-center justify-center my-4 mt-8 text-white text-center">
                    <button type="submit" id="submit-button" class="bg-indigo-800 font-bold uppercase w-6/12 h-full py-3 mr-2"> 
                        Delete
                    </button>

                    <a href="{{ route('companies') }}" class="bg-indigo-800 font-bold uppercase w-6/12 h-full py-3 ml-2"> 
                        Cancel
                    </a>
                </div>

            </form>

    </x-slot>
</x-crud-container>

@endauth
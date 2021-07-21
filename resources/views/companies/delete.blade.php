<x-crud-container>
    
    <x-slot name="title">
        Companies
    </x-slot>

    <x-slot name="arrowlink">
        "/companies"
    </x-slot>

    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Delete Company</h2>

        @auth
            <form method="POST" 
                    
                    action="/companies/{{$company->id}}/destroy" 
                    
                    <?php
                    //action="{{ route('companies') }}"
                    ?>

                    class="w-10/12" 
                    enctype="multipart/form-data"> 
                @csrf

                <p>Are you sure you want to delete {{$company->name}} and all of its employees?</p>

                <div id="button-div" class="flex flex-row items-center justify-center my-4 mt-8 text-white text-center">
                    <button type="submit" id="submit-button" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 mr-2"> 
                        Delete
                    </button>

                    <a href="/companies" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 ml-2"> 
                        Cancel
                    </a>
                </div>

            </form>
        @endauth

    </x-slot>
</x-crud-container>
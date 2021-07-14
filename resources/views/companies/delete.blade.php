<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="h-screen w-screen flex justify-center items-center fixed inset-0 z-50"> 
        <div class="bg-gray-100 border-2 w-11/12 max-w-screen-md max-h-full overflow-y-auto">
            <div class="flex flex-col items-center   border bg-white my-4 mx-4" >
                <h2 class="text-lg font-bold my-4">Delete Company?</h2>

                <a href="/companies" class="absolute self-end">Close</a>

                @auth
                    <form method="POST" 
                            action="/companies/{{$company->id}}/destroy" 
                            class="w-9/12" 
                            enctype="multipart/form-data"> 
                        @csrf

                        <p>Are you sure you want to delete {{$company->name}}?</p>


                        <!-- <button type="button" class="cancelbtn">Cancel</button> -->

                        <div id="button-div" class="my-4 mt-8 bg-indigo-700 text-white text-center">
                            <button type="submit" id="submit-button" class="font-bold uppercase w-full h-full py-3"> 
                                Delete
                            </button>
                        </div>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
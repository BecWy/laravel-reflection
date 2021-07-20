<?php
use App\Http\Controllers\CompanyController;
?>

<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="h-full w-full flex justify-start"> 
        <div class="bg-white w-full p-8 border relative">
        <a href="/companies" class="absolute right-4 top-4 px-4 py-2 text-3xl cursor-pointer text-indigo-900"><i class="far fa-arrow-alt-circle-left"></i></a>
            <div class="w-7/12 flex flex-col items-start bg-white px-auto" >
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

            </div>
        </div>
    </div>
</x-app-layout>
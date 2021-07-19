<?php
use App\Http\Controllers\CompanyController;
?>

<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div id="modal" class="modal h-screen w-screen flex justify-center items-center fixed inset-0 z-50"> 
        <div class="bg-gray-100 border-2 w-11/12 max-w-screen-md max-h-full overflow-y-auto">
            <!-- <p>When the edit button is clicked</p>
            <p>1. I need to find the correct row in the database</p>
            <p>2. I need to edit the correct row in the database</p>
            <p>3. I need to update the correct row in the database.</p>
            <br> -->
            <div class="flex flex-col items-center   border bg-white my-4 mx-4" >
                <h2 class="text-lg font-bold my-4">Edit Company</h2>

                <a href="/companies" class="absolute self-end px-4 py-2 text-lg"><i class="fas fa-times"></i></a>

                <!-- still need to add a way to identify the specific company in the action -->
                @auth
                    <form method="POST" 
                            action="/companies/{{$company->id}}/edit" 
                            class="w-9/12" 
                            enctype="multipart/form-data"> 
                        @csrf

                        <fieldset>
                            <div class="my-2">
                                <label for="name" class="font-bold">Name <span class="required">*</span></label><br>
                                <input type="text" 
                                    id="name" 
                                    name="name" 
                                    class="w-full" 
                                    required="required"
                                    @if(old('name'))
                                        value="{{ old('name') }}";
                                    @else
                                        value="{{$company->name}}";
                                    @endif
                                >
                                <br>
                                @error('name')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-2">
                                <label for="email" class="font-bold">Email</label><br>
                                <input type="email" 
                                    id="email" 
                                    name="email" 
                                    class="w-full" 
                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                    @if(old('email'))
                                        value="{{ old('email') }}";
                                    @else
                                        value="{{$company->email}}";
                                    @endif
                                >
                                <br>
                                @error('email')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="my-2">
                                <label for="logo" class="font-bold">Logo</label><br>
                                @if($company->logo)
                                    <p>Current file:</p>
                                    <p>{{$company->logo}}</p>

                                    <!-- //need to change this to a button and set the formaction -->
                                    <!-- <a href=" route('companies.destroyLogo') "><p id="delete-logo" class="cursor-pointer">Delete Current File</p></a> -->
                                    <!-- <a href="/companies/delete-logo" id="submit-button" class="font-bold uppercase w-full h-full py-3"> 
                                        Delete Logo
                                    </a> -->

                                @endif
                                <br>
                                <!-- this label acts as the button -->
                                <label class="relative w-12 my-12 mb-20 py-2 px-2 bg-indigo-700 text-white text-center font-bold uppercase w-full h-full cursor-pointer">
                                    <input type="file" 
                                        id="logo" 
                                        name="logo" 
                                        class="w-full"
                                        style="display:none"
                                        @if(old('logo'))
                                            value="{{ old('logo') }}";
                                        @else
                                            value="{{$company->logo}}";
                                        @endif
                                    >
                                    @error('logo')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                Upload
                                </label>    
                            </div>

                            <div class="my-2">
                                <label for="website" class="font-bold">Website</label><br>
                                <input type="text" 
                                    id="website" 
                                    name="website" 
                                    class="w-full"
                                    @if(old('website'))
                                        value="{{ old('website') }}";
                                    @else
                                        value="{{$company->website}}";
                                    @endif
                                >
                                <br>
                                @error('website')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </fieldset>

                        <div id="button-div" class="my-4 mt-8 bg-indigo-700 text-white text-center">
                            <button type="submit" id="submit-button" class="font-bold uppercase w-full h-full py-3"> 
                                Update
                            </button>
                        </div>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
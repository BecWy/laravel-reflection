<x-crud-container>
    
    <x-slot name="title">
        Companies
    </x-slot>

    <x-slot name="arrowlink">
        "/companies"
    </x-slot>

    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Edit Company</h2>
            
        @auth
            <form method="POST" 
                    action="/companies/{{$company->id}}/edit" 
                    class="w-10/12" 
                    role="form"
                    enctype="multipart/form-data"> 
                @csrf

                <fieldset>
                    <div class="my-2">
                        <label for="name" class="font-bold">Name <span class="required">*</span></label><br>
                        <input
                            type="text" 
                            id="name" 
                            name="name" 
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            required="required"
                            value = "{{ old('name') ? old('name') : $company->name }}" 
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
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" 
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$" 
                            value = "{{ old('email') ? old('email') : $company->email }}" 
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
                        <!-- <label class="relative w-12 my-12 mb-20 py-2 px-2 bg-indigo-700 text-white text-center font-bold uppercase w-full h-full cursor-pointer"> -->
                            <input type="file" 
                                id="logo" 
                                name="logo" 
                                class="w-full"
                                <?php
                                // style="display:none"
                                ?>
                                value = "{{ old('logo') ? old('logo') : $company->logo }}" 
                            >
                            @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        <!-- Upload -->
                        <!-- </label>     -->
                    </div>

                    <div class="my-2">
                        <label for="website" class="font-bold">Website</label><br>
                        <input type="text" 
                            id="website" 
                            name="website" 
                            class="w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            value = "{{ old('website') ? old('website') : $company->website }}" 
                        >
                        <br>
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </fieldset>

                <div id="button-div" class="flex flex-row items-center justify-center my-4 mt-8 text-white text-center">
                    <button type="submit" id="submit-button" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 mr-2"> 
                        Update
                    </button>

                    <a href="/companies" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 ml-2"> 
                        Cancel
                    </a>
                </div>

            </form>
        @endauth

    </x-slot>
</x-crud-container>
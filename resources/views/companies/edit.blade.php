<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="h-screen w-screen flex justify-center items-center fixed inset-0 z-50"> 
        <div class="bg-gray-100 border-2 w-11/12 max-w-screen-md max-h-full overflow-y-auto">
            <!-- <p>When the edit button is clicked</p>
            <p>1. I need to find the correct row in the database</p>
            <p>2. I need to edit the correct row in the database</p>
            <p>3. I need to update the correct row in the database.</p>
            <br> -->
            <div class="flex flex-col items-center   border bg-white my-4 mx-4" >
                <h2 class="text-lg font-bold my-4">Edit Company</h2>

                <!-- still need to add a way to identify the specific company in the action -->
                @auth
                    <form method="POST" 
                            action="/companies/edit" 
                            class="w-9/12" 
                            enctype="multipart/form-data"> 
                        @csrf

                        <fieldset>
                            <div class="my-2">
                                <label for="name" class="font-bold">Name <span class="required">*</span></label><br>
                                <input type="text" 
                                    id="name" 
                                    name="company_name" 
                                    class="w-full" 
                                    required="required"
                                    value="{{$company->name}}"><br>
                            </div>

                            <div class="my-2">
                                <label for="email" class="font-bold">Email</label><br>
                                <input type="email" 
                                    id="email" 
                                    name="company_email" 
                                    class="w-full" 
                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                    value="{{$company->email}}"><br>
                            </div>

                            <div class="my-2">
                                <label for="logo" class="font-bold">Logo</label><br>
                                @if($company->logo)
                                    <p>Current file:</p>
                                    <p>{{$company->logo}}</p>
                                @endif
                                <br>
                                <!-- this label acts as the button -->
                                <label class="relative w-12 my-12 mb-20 py-2 px-2 bg-blue-500 text-white text-center font-bold uppercase">
                                    <input type="file" 
                                        id="logo" 
                                        name="company_logo" 
                                        class="w-full"
                                        content="hi"
                                        style="display:none"
                                    >
                                    
                                Upload
                                </label>    
                            </div>

                            <div class="my-2">
                                <label for="website" class="font-bold">Website</label><br>
                                <input type="text" 
                                    id="website" 
                                    name="company_website" 
                                    class="w-full"
                                    value="{{$company->website}}"><br>
                            </div>

                        </fieldset>

                        <div id="button-div" class="my-4 mt-8 py-3 bg-blue-500 text-white text-center">
                            <button type="submit" id="submit-button" class="font-bold uppercase"> 
                                Update
                            </button>
                        </div>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
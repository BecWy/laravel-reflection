<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="h-screen w-screen flex justify-center items-center fixed inset-0 z-50"> 
        <div class="bg-gray-100 border-2 w-11/12 max-w-screen-md max-h-full overflow-y-auto">
            <div class="flex flex-col items-center   border bg-white my-4 mx-4" >
                <h2 class="text-lg font-bold my-4">Create Company</h2>

                <a href="/companies" class="absolute self-end px-4 py-2 text-lg"><i class="fas fa-times"></i></a>

                @auth
                    <form method="POST" 
                            action="{{ route('companies.store') }}" 
                            class="w-9/12" 
                            role="form"
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
                                    >
                                    <br>
                            </div>

                            <div class="my-2">
                                <label for="email" class="font-bold">Email</label><br>
                                <input type="email" 
                                    id="email" 
                                    name="email" 
                                    class="w-full" 
                                    pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                                    >
                                    <br>
                            </div>

                            <div class="my-2">
                                <label for="logo" class="font-bold">Logo</label><br>
                                <br>
                                <!-- this label acts as the button -->
                                <!-- <label class="relative w-12 my-12 mb-20 py-2 px-2 bg-indigo-700 text-white text-center font-bold uppercase w-full h-full cursor-pointer"> -->
                                    <input type="file" 
                                        id="logo" 
                                        name="logo" 
                                        class="w-full"
                                        
                                    >
                                    
                                <!-- Upload style="display:none" -->
                                <!-- </label>     -->
                            </div>

                            <div class="my-2">
                                <label for="website" class="font-bold">Website</label><br>
                                <input type="text" 
                                    id="website" 
                                    name="website" 
                                    class="w-full"
                                >
                                <br>
                            </div>

                        </fieldset>

                        <div id="button-div" class="my-4 mt-8 bg-indigo-700 text-white text-center">
                            <button type="submit" id="submit-button" class="font-bold uppercase w-full h-full py-3"> 
                                Create
                            </button>
                        </div>
                    </form>
                @endauth

            </div>
        </div>
    </div>
</x-app-layout>
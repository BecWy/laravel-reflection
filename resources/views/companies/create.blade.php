<x-crud-container>

    <x-slot name="title">
        Companies
    </x-slot>

    <x-slot name="arrowlink">
        "/companies"
    </x-slot>

    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Create Company</h2>

        @auth
            <form method="POST" 
                    action="{{ route('companies.store') }}" 
                    class="w-10/12" 
                    role="form"
                    enctype="multipart/form-data"> 
                @csrf

                <fieldset>
                    <div class="my-2">
                        <label for="name" class="font-bold">Name <span class="required">*</span></label><br>
                        <x-input :disabled="false"
                            type="text" 
                            id="name" 
                            name="name" 
                            class="w-full" 
                            required="required"
                            value="{{ old('name') }}"
                        />
                        <br>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-2">
                        <label for="email" class="font-bold">Email</label><br>
                        <x-input :disabled="false" 
                            type="email" 
                            id="email" 
                            name="email" 
                            class="w-full" 
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
                            value="{{ old('email') }}"
                        />
                        <br>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-2">
                        <label for="logo" class="font-bold">Logo</label><br>
                        <br>
                        <input 
                            type="file" 
                            id="logo" 
                            name="logo" 
                            class="w-full"  
                            value="{{ old('logo') }}"
                        >
                        @error('logo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                        
                    </div>

                    <div class="my-2">
                        <label for="website" class="font-bold">Website Domain <span class="text-sm font-normal">(example.com)</span></label><br>
                        <x-input :disabled="false" 
                            type="text" 
                            id="website" 
                            name="website" 
                            class="w-full"
                            value="{{ old('website') }}"
                        />
                        <br>
                        @error('website')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </fieldset>

                <div id="button-div" class="flex flex-row items-center justify-center my-4 mt-8 text-white text-center">
                    <button type="submit" id="submit-button" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 mr-2"> 
                        Create
                    </button>

                    <a href="/companies" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 ml-2"> 
                        Cancel
                    </a>
                </div>

            </form>
        @endauth
    </x-slot>
</x-crud-container>

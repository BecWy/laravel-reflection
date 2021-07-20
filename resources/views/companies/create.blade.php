<div class="h-screen w-screen flex justify-center items-center fixed inset-0 z-50"> 
    <div class="bg-white border rounded-lg w-7/12 max-w-screen-md max-h-full overflow-y-auto">
        <div class="flex flex-col items-center bg-white my-4 mx-4" >
            <h2 class="text-lg font-bold my-4">Create Company</h2>

            <a onclick="hideCreateModal()" class="absolute self-end px-4 py-2 text-lg cursor-pointer"><i class="fas fa-times"></i></a>

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
                            <input type="text" 
                                id="name" 
                                name="name" 
                                class="w-full" 
                                required="required"
                                value="{{ old('name') }}"
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
                                value="{{ old('email') }}"
                            >
                            <br>
                            @error('email')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
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
                                value="{{ old('logo') }}"
                            >
                                
                            <!-- Upload style="display:none" -->
                            <!-- </label>     -->
                            @error('logo')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="my-2">
                            <label for="website" class="font-bold">Website Domain <span class="text-sm font-normal">(example.com)</span></label><br>
                            <input type="text" 
                                id="website" 
                                name="website" 
                                class="w-full"
                                value="{{ old('website') }}"
                            >
                            <br>
                            @error('website')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
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

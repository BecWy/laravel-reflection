<x-crud-container>

    <x-slot name="title">
        Employees
    </x-slot>

    <x-slot name="arrowlink">
        "/employees"
    </x-slot>

    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Edit Employee</h2>

        @auth
            <form method="POST" 
                    action="/employees/{{$employee->id}}/edit" 
                    class="w-full" 
                    enctype="multipart/form-data"> 
                @csrf

                <fieldset>
                    <div class="my-2">
                        <label for="first_name" class="font-bold">First Name <span class="required">*</span></label><br>
                        <input type="text" 
                            id="first_name" 
                            name="first_name" 
                            class="w-full" 
                            required="required"
                            @if(old('first_name'))
                                value="{{ old('first_name') }}";
                            @else
                                value="{{$employee->first_name}}";
                            @endif
                        >
                        <br>
                        @error('first_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-2">
                        <label for="last_name" class="font-bold">Last Name <span class="required">*</span></label><br>
                        <input type="text" 
                            id="last_name" 
                            name="last_name" 
                            class="w-full" 
                            required="required"
                            @if(old('last_name'))
                                value="{{ old('last_name') }}";
                            @else
                                value="{{$employee->last_name}}";
                            @endif
                        >
                        <br>
                        @error('last_name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- NEED TO ADD COMPANY -->
                    <label for="company" class="font-bold text-red-500">Company <span class="required">*</span></label><br>

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
                                value="{{$employee->email}}";
                            @endif
                        >
                        <br>
                        @error('email')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="my-2">
                        <label for="phone" class="font-bold">Phone</label><br>
                        <input type="tel" 
                            id="phone" 
                            name="phone" 
                            class="w-full"
                            @if(old('phone'))
                                value="{{ old('phone') }}";
                            @else
                                value="{{$employee->phone}}";
                            @endif
                        >
                        <br>
                        @error('phone')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                </fieldset>

                <div id="button-div" class="flex flex-row items-center justify-center my-4 mt-8 text-white text-center">
                    <button type="submit" id="submit-button" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 mr-2"> 
                        Update
                    </button>

                    <a href="/employees" class="bg-indigo-700 font-bold uppercase w-6/12 h-full py-3 ml-2"> 
                        Cancel
                    </a>
                </div>

            </form>
        @endauth

    </x-slot>
</x-crud-container>
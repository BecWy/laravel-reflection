<x-crud-container>

    <x-slot name="title">
        Employees
    </x-slot>

    <x-slot name="arrowlink">
        "/employees"
    </x-slot>

    <x-slot name="content">
        <h2 class="text-lg font-bold mb-4">Create Employee</h2>

        @auth
            <form method="POST" 
                    action="{{ route('employees.store') }}" 
                    class="w-10/12" 
                    role="form"
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
                            value="{{ old('first_name') }}"
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
                            value="{{ old('last_name') }}"
                        >
                        <br>
                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="my-2">
                        <label for="company_id" class="font-bold text-red-500">Company <span class="required">*</span></label><br>
                        <select
                            id="company_id" 
                            name="company_id" 
                            class="w-full" 
                            required="required"
                            value="{{ old('company_id') }}"
                        >
                            @foreach($companies as $company)
                                <option value="{{$company->id}}">{{$company->name}}</option>
                            @endforeach
                        </select>
                        <br>
                        @error('company')
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
                        <label for="phone" class="font-bold">Phone</label><br>
                        <input type="tel" 
                            id="phone" 
                            name="phone" 
                            class="w-full"
                            value="{{ old('phone') }}"
                        >
                        <br>
                        @error('phone')
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
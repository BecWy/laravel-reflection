<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <!-- <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    You're logged in!
                </div>
            </div>
        </div>
    </div> -->

    <div class="flex flex-row flex-wrap justify-start items-start">

        <div class="m-4 h-48 w-48 bg-white overflow-hidden shadow-sm bg-white border-b border-gray-200 flex justify-center items-center">
            <a class="w-full h-full flex justify-center items-center" href="{{ route('companies') }}">
                <h2 class="text-lg font-semibold">Companies</h2>
            </a>
        </div>
        
        <div class="m-4 h-48 w-48 bg-white overflow-hidden shadow-sm bg-white border-b border-gray-200 flex justify-center items-center">
            <a class="w-full h-full flex justify-center items-center" href="{{ route('employees') }}">
                <h2 class="text-lg font-semibold">Employees</h2>
            </a>
        </div>

    </div>

</x-app-layout>

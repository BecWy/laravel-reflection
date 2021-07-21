<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">

            {{ $title }}
            
        </h2>
    </x-slot>

    <div class="h-full w-full flex justify-start"> 
        <div class="bg-white w-full p-8 border relative">
            <a href={{ $arrowlink }} class="absolute right-4 top-4 px-4 py-2 text-3xl cursor-pointer text-indigo-900"><i class="far fa-arrow-alt-circle-left"></i></a>
            <div class="w-7/12 flex flex-col items-start bg-white px-auto" >

            {{ $content }}

            </div>
        </div>
    </div>
    
</x-app-layout>
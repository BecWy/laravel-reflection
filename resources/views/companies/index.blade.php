<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="mx-auto m-w-full w-full">
        
        <div class="m-w-full w-full flex flex-wrap flex-col lg:flex-row lg:items-center lg:justify-start my-4">

            <!-- If I want to add filtering in the future just change this div to a form - styling is already set up ready -->
            <!-- <div class="h-10 sm:w-full sm:max-w-full md:w-7/12 lg:w-5/12 flex items-center justify between">
            </div> -->


            <form method="GET" action="{{ route('companies') }}" class="h-10 sm:w-full sm:max-w-full md:w-7/12 lg:w-5/12 mt-4 lg:mt-0 flex items-center">
                <input type="text" 
                    id="search" 
                    name="search" 
                    class="h-full w-full sm:max-w-300 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"  
                    value="{{ request()->query('search') }}"                 
                >

                <button type="submit" id="search-button" class="text-white text-xs tracking-wider bg-indigo-800 font-bold uppercase w-20 h-full py-3 ml-1 rounded-md"> 
                    Search
                </button>

            </form>

            <!-- container for icon links -->
            <div class="mt-4 lg:mt-0 lg:ml-auto">
                <a href="/companies/create" class="text-4xl cursor-pointer text-indigo-800"><i class="far fa-plus-square"></i></a>
            </div>
        
        </div>

        <div class="overflow-x-auto md:overflow-x-hidden w-full mb-4 mt-2">

        <?php
        // @if(!$companies->count())
        //     <p>There are no companies saved.</p>
        // @else
        ?>

            <table class="my-4 py-4 bg-white m-w-full w-full">
                <tr>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2"></th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Name</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Email</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Logo</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Website</th>
                    <th class="bg-indigo-800 text-white tracking-wider font-semibold text-left px-4 py-2">Actions</th>
                </tr>
                

                <?php
                $id = 0;
                ?> 
                    
                @foreach ($companies as $company)
    
                    <?php
                    $id += 1;
                    $currentPage =  request()->get('page');

                    if($currentPage) {
                        $offset = ($currentPage - 1) * 10;
                    } else {
                        $offset = 0;
                    }
                    
                    $calculatedID = $id + $offset; 
                    ?>
                    
                    <tr>
                        <td class="border px-4 py-2 align-top text-sm">{{$calculatedID;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$company->name;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">{{$company->email;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">
                            @if ($company->logo)
                                <img src="{{ $company->logo }}" alt="image" class="h-11 h-11">
                            @endif()
                        </td>
                        <td class="border px-4 py-2 align-top text-sm">{{$company->website;}}</td>
                        <td class="border px-4 py-2 align-top text-sm">
                            <a href="/companies/{{$company->id}}/edit" class="pr-2 cursor-pointer"><i class="far fa-edit"></i></a>
                            <a href="/companies/{{$company->id}}/delete" class="cursor-pointer"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                @endforeach

               
        
            </table>
        <?php
        //@endif
        ?>
        </div>

        
        @if($companies->count())
            {{ $companies->links() }}
        @else   
            <p>There are no companies saved.</p>
        @endif
        

    <!-- if the white strip reappears at the bottom of this page check the min height settings again -->
    </div>
    <br>

</x-app-layout>



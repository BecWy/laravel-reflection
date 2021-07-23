<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>


    <div class="mx-auto m-w-full">
        <div class="flex flex-row items-end justify-end">
            <a href="/companies/create" class="text-3xl cursor-pointer text-indigo-800" p-1><i class="far fa-plus-square"></i></a>
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
                                <img src="{{ $company->logo }}" alt="image" class="h-11 h-11"></img>
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



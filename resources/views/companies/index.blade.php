<x-app-layout>
  
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div class="mx-auto m-w-full overflow-x-auto">

        <div class="flex flex-row items-end justify-end">
            <a href="/companies/create">Create Button</a>
        </div>

        <table class="my-4 py-4 bg-white m-w-full w-full">
            <tr>
                <th class="bg-blue-100 border text-left px-4 py-2">ID</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Name</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Email</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Logo</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Website</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Actions</th>
            </tr>

            @foreach ($companies as $company)
            
            <tr>
                <td class="border px-4 py-2 align-top text-sm">{{$company->id;}}</td>
                <td class="border px-4 py-2 align-top text-sm">{{$company->name;}}</td>
                <td class="border px-4 py-2 align-top text-sm">{{$company->email;}}</td>
                <td class="border px-4 py-2 align-top text-sm"><img src="{{$company->logo;}}" class="h-11 h-11"></img></td>
                <td class="border px-4 py-2 align-top text-sm">{{$company->website;}}</td>
                <td class="border px-4 py-2 align-top text-sm">
                    <a href="/companies/{{$company->id}}/edit" class="pr-2">Edit</a>
                    <a href="#">Del</a>
                </td>
            </tr>
            @endforeach
            
        </table>

        @if($companies->count())
            {{ $companies->links() }}
        @else   
            <p>There are no companies saved.</p>
        @endif

        <br>

        <p>Seeing what happens with some text here. The background color now extends and doens't leave a white strip at the bottom of the page. </p>
        <p>Ah I think this is because the min height for the layout container is smaller than my screen height.</p>
        <p>I need to set the min height to 100vh instead of whatever is there at the moment.</p>
    </div>

    <br>

</x-app-layout>



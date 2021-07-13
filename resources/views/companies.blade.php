<?php
use App\Models\Company;
?>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Companies') }}
        </h2>
    </x-slot>

    <div>
        <table class="mx-4 my-4 py-4 bg-white">
            <tr>
                <th class="bg-blue-100 border text-left px-4 py-2">ID</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Name</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Email</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Logo</th>
                <th class="bg-blue-100 border text-left px-4 py-2">Website</th>
            </tr>


            <!-- //need to loop through and display each company in a <td> -->
            <?php
            $companies = Company::get();

            foreach($companies as $company){
            ?>
            <tr>
            <td class="border px-4 py-2 align-top text-sm">{{$company->id;}}</td>
            <td class="border px-4 py-2 align-top text-sm">{{$company->name;}}</td>
            <td class="border px-4 py-2 align-top text-sm">{{$company->email;}}</td>
            <td class="border px-4 py-2 align-top text-sm">{{$company->logo;}}</td>
            <td class="border px-4 py-2 align-top text-sm">{{$company->website;}}</td>
            </tr>
            
            <?php
            };
            ?>
        </table>

        <p>Seeing what happens with some text here. The background color now extends and doens't leave a white strip at the bottom of the page. </p>
        <p>Ah I think this is because the min height for the layout container is smaller than my screen height.</p>
    </div>

</x-app-layout>



<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="w-screen h-screen overflow-hidden">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Icons -->
        <script src="https://kit.fontawesome.com/58da4f92e2.js" crossorigin="anonymous"></script> 

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>

    <body class="font-sans antialiased overflow-y-auto overflow-x-hidden w-screen h-screen">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>

            <!-- Page Content -->
            <main class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                {{ $slot }}
            </main>
        </div>

        <!-- flash messages -->
        @if(session()->has('success'))
            <div id="success-message" class="fixed bg-indigo-800 text-white py-2 px-4 rounded-xl bottom-3 right-7 text-sm transition duration-500">
                <p>{{ session('success') }}</p>
            </div>

            <script>
                const successMessage = document.querySelector('#success-message');
                setTimeout(function(){
                    successMessage.style.opacity="0";
                }, 4000);
            </script>
        @endif

        <!-- my show modal script -->
        <script src="{{ asset('js/modal.js') }}"></script>

    </body>
</html>

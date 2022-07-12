<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') .' - '. $header }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <!-- Styles -->
        @livewireStyles

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        @vite(['resources/css/bootstrap.css', 'resources/js/bootstrap.js'])
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                          {{$header}}
                        </h2>  
                    </div>
                </header>
            @endif

            <div class="py-6">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                 @if($errors->any())
                    <div class="alert alert-danger">
                        {{$errors->first()}}
                    </div>
                 @endif

                 @if(session('success'))
                 <div class="alert alert-success">
                    <i class="fa fa-check"></i>&nbsp;{{session('success')}}
                </div>
                 @endif
                 
                    {{$slot}}
                </div>
            </div>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>


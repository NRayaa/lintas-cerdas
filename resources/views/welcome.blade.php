<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Lintas Cerdas</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('storage/css/app.css') }}">
        <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
        <link href="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.css" rel="stylesheet" />
        <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
        <script src="{{ asset('storage/js/app.js') }}"></script>
    </head>
    <body class="w-full h-screen flex items-center justify-center bg-gray-100">
        <main class="w-full flex flex-col items-center justify-center">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold">SELAMAT DATANG DI LINTAS CERDAS</h1>
                <p class="text-center text-gray-600">Pilih Jenjang Di Bawah</p>
            </div>
            <div class="flex items-center justify-center gap-10">
                <!-- Logo SD -->
                <a href="{{route('dashboard.sd')}}" class="w-24 h-24 flex items-center justify-center bg-white rounded-xl shadow-md hover:scale-110 hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <img src="{{ asset('storage/assets/logo/sd.jpg') }}" alt="SD" class="w-16 h-16">
                </a>
                <!-- Logo SMP -->
                <a href="{{route('dashboard.smp')}}" class="w-24 h-24 flex items-center justify-center bg-white rounded-xl shadow-md hover:scale-110 hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <img src="{{ asset('storage/assets/logo/smp.jpg') }}" alt="SMP" class="w-16 h-16">
                </a>
                <!-- Logo SMA -->
                <a href="{{route('goal.sma')}}" class="w-24 h-24 flex items-center justify-center bg-white rounded-xl shadow-md hover:scale-110 hover:shadow-xl transition-all duration-300 cursor-pointer">
                    <img src="{{ asset('storage/assets/logo/sma.jpeg') }}" alt="SMA" class="w-16 h-16">
                </a>
            </div>
        </main>
    </body>


</html>

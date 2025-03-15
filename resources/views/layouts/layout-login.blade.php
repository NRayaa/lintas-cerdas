<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://unpkg.com/@tailwindcss/browser@4"></script>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@5" rel="stylesheet" type="text/css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <link rel="stylesheet" href="{{ asset('storage/css/app.css') }}">
    <script src="{{ asset('storage/js/app.js') }}"></script>


</head>

<body data-theme="cupcake" class="bg-cover bg-center min-h-screen" style="@yield('background')">
    <nav class="w-full">

        <body class="bg-blue-600">
            <div class="navbar bg-transparent w-full flex justify-center backdrop-blur-md text-white shadow-md">
                <div class="navbar-center w-full flex justify-center">
                    <a href="" class="btn btn-ghost text-2xl text-white font-bold">Lintas Cerdas</a>
                </div>
            </div>
        </body>

    </nav>

    <main class="w-full">
        @yield('content')
    </main>

</body>

</html>

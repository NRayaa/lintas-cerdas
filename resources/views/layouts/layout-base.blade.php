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
            <div class="navbar bg-transparent backdrop-blur-md @yield('text-white') shadow-md">
                <div class="navbar-start">
                    <div class="dropdown">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle @yield('text-white')">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h7" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content bg-white text-gray-800 rounded-box z-10 mt-3 w-52 p-2 shadow">
                            @yield('menulist')
                            {{-- @if ($globalUser->type === 'sd')
                                <li><a href="{{ route('dashboard.sd') }}">Beranda</a></li>
                                <li><a href="{{ route('goal.sd') }}">Tujuan</a></li>
                                <li><a href="{{ route('subject.sd') }}">Materi</a></li>
                                <li><a href="{{ route('gallery.sd') }}">Galeri</a></li>
                                <li><a href="{{ route('quiz.sd') }}">Quiz</a></li>
                            @elseif($globalUser->type === 'smp')
                                <li><a href="{{ route('dashboard.smp') }}">Beranda</a></li>
                                <li><a href="{{ route('goal.smp') }}">Tujuan</a></li>
                                <li><a href="{{ route('subject.smp') }}">Materi</a></li>
                                <li><a href="{{ route('gallery.smp') }}">Galeri</a></li>
                                <li><a href="{{ route('quiz.smp') }}">Quiz</a></li>
                            @else
                                <li><a href="{{ route('login') }}">Login</a></li>
                            @endif --}}
                        </ul>
                    </div>
                </div>
                <div class="navbar-center">
                    <a href="" class="btn btn-ghost text-2xl @yield('text-white') font-bold">Lintas Cerdas</a>
                </div>
                <div class="navbar-end">
                    <div class="dropdown dropdown-end">
                        <div tabindex="0" role="button" class="btn btn-ghost btn-circle @yield('text-white')">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-gear" viewBox="0 0 16 16">
                                <path
                                    d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492M5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0" />
                                <path
                                    d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115z" />
                            </svg>
                        </div>
                        <ul tabindex="0"
                            class="menu menu-sm dropdown-content bg-white text-gray-800 rounded-box z-10 space-y-3 mt-5 w-24 lg:w-52 p-2 shadow">
                            {{-- @if ($globalUser->type === 'sd')
                                <li><a href="{{ route('profile.sd') }}">Profile</a></li>
                            @elseif ($globalUser->type === 'smp')
                                <li><a href="{{ route('profile.smp') }}">Profile</a></li>
                            @endif --}}
                            <li>
                                @guest
                                    <a href="{{ route('login') }}" class="cursor-pointer">Login</a>
                                @else
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="cursor-pointer">Log Out</button>
                                    </form>
                                @endguest
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </body>

    </nav>

    <main class="w-full">
        @yield('content')
    </main>

</body>

</html>

@extends('layouts.layout-login')

@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-1.jpg') . ');';
@endphp

@section('background', $background)

@section('content')
    <div class="flex justify-center md:hidden text-center w-full">
        @include('components.title', [
            'titles' => ['Ayo Login !!'],
        ])
    </div>

    <div class="flex text-[3rem] md:block hidden font-bold mt-10 justify-center text-center">
        Ayo Login !!
    </div>

    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">🔐 Login</h1>

            <form action="{{ route('login') }}" method="POST" class="max-w-xl mx-auto">
                @csrf

                <!-- Email -->
                <div class="mt-4">
                    <label class="block text-gray-800 font-semibold">Email</label>
                    <input type="email" name="email" class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg" placeholder="Masukkan email" required>
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <label class="block text-gray-800 font-semibold">Password</label>
                    <input type="password" name="password" class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg" placeholder="Masukkan password" required>
                </div>

                <!-- Error Message -->
                @if ($errors->any())
                    <p class="text-red-600 text-center mt-4">{{ $errors->first() }}</p>
                @endif

                <!-- Tombol Login -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-gray-800 text-white px-6 py-2 cursor-pointer rounded-lg shadow-md hover:bg-gray-900">
                        🚀 Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection

@extends('layouts.layout-base')

@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-2.jpg') . ');';
@endphp

@section('background', $background)

@section('content')
    <div class="flex justify-center md:hidden text-center w-full">
        @include('components.title', [
            'titles' => ['EDIT PROFIL'],
        ])
    </div>

    @include('components.next-prev', [
        'prev' => route('dashboard.smp'),
        'titles' => ['KEMBALI KE BERANDA'],
    ])

    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">✏️ Edit Profil</h1>
            <form action="{{route('update-profile.smp')}}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto">
                @csrf

                <!-- Nama -->
                <div class="mt-6">
                    <label class="block text-gray-800 font-semibold">Nama Lengkap</label>
                    <input type="text" name="name" value="{{$globalUser->name}}"
                        class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg">
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <label class="block text-gray-800 font-semibold">Email</label>
                    <input type="email" name="email" value="{{$globalUser->email}}"
                        class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg">
                </div>

                <!-- Tombol Simpan -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-gray-800 cursor-pointer text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-900">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

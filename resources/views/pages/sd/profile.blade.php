@extends('layouts.layout-base')

@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-1.jpg') . ');';
@endphp

@section('background', $background)
@section('text-white', 'text-white')

@section('content')
    <div class="flex justify-center md:hidden text-center w-full">
        @include('components.title', [
            'titles' => ['EDIT PROFIL'],
        ])
    </div>

    @include('components.next-prev', [
        'prev' => route('dashboard.sd'),
        'titles' => ['KEMBALI KE BERANDA'],
    ])

    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">✏️ Edit Profil</h1>

            <form action="{{ route('update-profile')}}" method="POST" enctype="multipart/form-data" class="max-w-xl mx-auto">
                @csrf

                <!-- Avatar Upload -->
                {{-- <div class="flex flex-col items-center">
                    <!-- Pratinjau Gambar -->
                    <div class="w-32 h-32 bg-gray-300 rounded-full overflow-hidden shadow-lg mb-4">
                        <img id="avatar-preview" src="{{ asset('storage/profile/default-avatar.png') }}" alt="Avatar" class="w-full h-full object-cover">
                    </div>

                    <!-- Custom File Upload -->
                    <label for="avatar-input" class="cursor-pointer bg-gray-800 text-white px-4 py-2 rounded-lg shadow-md hover:bg-gray-900">
                        📸 Unggah Foto
                    </label>
                    <input type="file" name="avatar" id="avatar-input" class="hidden" accept="image/*" onchange="previewImage(event)">
                </div> --}}

                <!-- Nama -->
                <div class="mt-6">
                    <label class="block text-gray-800 font-semibold">Nama Lengkap</label>
                    <input type="text" name="name" value="{{$globalUser->name}}" class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg">
                </div>

                <!-- Email -->
                <div class="mt-4">
                    <label class="block text-gray-800 font-semibold">Email</label>
                    <input type="email" name="email" value="{{$globalUser->email}}" class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg">
                </div>

                <!-- Tombol Simpan -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-gray-800 cursor-pointer text-white px-6 py-2 rounded-lg shadow-md hover:bg-gray-900">
                        💾 Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>

        <!-- Section Ganti Password -->
        {{-- <div class="border-4 border-gray-800 bg-gray-100 py-6 px-8 rounded-lg shadow-lg mt-10">
            <h1 class="text-2xl font-bold text-gray-900 text-center mb-6">🔑 Ganti Password</h1>

            <form action="{{ route('update-password') }}" method="POST" class="max-w-xl mx-auto">
                @csrf

                <!-- Password Lama -->
                <div class="mt-4">
                    <label class="block text-gray-800 font-semibold">Password Lama</label>
                    <input type="password" name="current_password" class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg" placeholder="Masukkan password lama">
                </div>

                <!-- Password Baru -->
                <div class="mt-4">
                    <label class="block text-gray-800 font-semibold">Password Baru</label>
                    <input type="password" name="new_password" class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg" placeholder="Masukkan password baru">
                </div>

                <!-- Konfirmasi Password -->
                <div class="mt-4">
                    <label class="block text-gray-800 font-semibold">Konfirmasi Password Baru</label>
                    <input type="password" name="confirm_password" class="w-full mt-1 p-2 border-2 border-gray-800 rounded-lg" placeholder="Konfirmasi password baru">
                </div>

                <!-- Tombol Simpan Password -->
                <div class="mt-6 text-center">
                    <button type="submit" class="bg-red-600 text-white px-6 py-2 rounded-lg shadow-md hover:bg-red-700">
                        🔄 Ubah Password
                    </button>
                </div>
            </form>
        </div> --}}
    </div>

@endsection

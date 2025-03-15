@extends('layouts.layout-base')
@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-1.jpg') . ');';
@endphp
@section('menulist')
    <li><a href="{{ route('dashboard.sd') }}">Beranda</a></li>
    <li><a href="{{ route('goal.sd') }}">Tujuan</a></li>
    <li><a href="{{ route('subject.sd') }}">Materi</a></li>
    <li><a href="{{ route('gallery.sd') }}">Galeri</a></li>
    <li><a href="{{ route('quiz.sd') }}">Quiz</a></li>
@endsection
@section('background', $background)
@section('text-white', 'text-white')

@section('content')
    <div class="flex justify-center md:hidden text-center w-full">
        @include('components.title', [
            'titles' => ['TUJUAN PEMBELAJARAN'],
        ])
    </div>
    @include('components.next-prev', [
        'prev' => route('dashboard.sd'),
        'next' => route('subject.sd'),
        'titles' => ['TUJUAN PEMBELAJARAN'],
    ])
    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-4 rounded-lg shadow-lg ">
            <div class="grid grid-cols-8 items-center gap-4 w-full px-5">
                <div class="flex flex-col justify-between h-full">
                    @foreach (range(1, 2) as $i)
                        @include('components.icon-side', [
                            'class' => 'flex justify-center',
                            'path' => 'storage/assets/svg/home/traffic-light-1.svg',
                            'size' => 'w-40 h-auto',
                            'animation' => 'transition-transform duration-500 hover:animate-swing-scale',
                        ])
                    @endforeach
                </div>

                <div class=" col-span-6">
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 text-center">Pintar Berlalu Lintas</h1>
                    @if ($data)
                        {!! $data->content !!} {{-- Pastikan menggunakan {!! !!} agar HTML dapat dirender --}}
                    @else
                        <span style="color: red;">Data tidak tersedia</span>
                    @endif
                </div>
                <div class="flex flex-col justify-between h-full">
                    @foreach (range(1, 2) as $i)
                        @include('components.icon-side', [
                            'class' => 'flex justify-center',
                            'path' => 'storage/assets/svg/home/traffic-light-1.svg',
                            'size' => 'w-40 h-auto',
                            'animation' => 'transition-transform duration-500 hover:animate-swing-scale',
                        ])
                    @endforeach
                </div>

            </div>

        </div>
    </div>
@endsection

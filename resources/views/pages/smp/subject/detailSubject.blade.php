@extends('layouts.layout-base')
@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-2.jpg') . ');';
@endphp

@section('background', $background)
@section('content')
    <div class="flex justify-center md:hidden text-center w-full">
        @include('components.title', [
            'titles' => ['TUJUAN PEMBELAJARAN'],
        ])
    </div>

    @include('components.next-prev', [
        'prev' => route('dashboard.smp'),
        'next' => route('gallery.smp'),
        'titles' => ['SUB MATERI PEMBELAJARAN'],
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
                    <h1 class="text-3xl lg:text-5xl font-bold text-gray-900 text-center">{{ $data->name }}</h1>
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

    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">📚 Gambar Sub Materi ({{$data->name}})</h1>

            <div class="lg:columns-2 gap-6 space-y-6">
                @foreach ($dataImages as $dataImage)
                    @include('components.list-image', [
                        'image' => $dataImage->img,
                        'title' => $dataImage->name,
                        'description' => $dataImage->content,
                    ])
                @endforeach
            </div>

        </div>
    </div>


@endsection

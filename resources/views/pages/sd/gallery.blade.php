@extends('layouts.layout-base')
@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-1.jpg') . ');';
@endphp

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
        'next' => route('quiz.sd'),
        'titles' => ['MATERI PEMBELAJARAN'],
    ])

    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">📚 Galeri Pembelajaran</h1>

            <div class="lg:columns-2 gap-6 space-y-6">
                @foreach ($datas as $data)
                    @include('components.list-image', [
                        'image' => $data->img,
                        'title' => $data->name,
                        'description' => $data->content,
                    ])
                @endforeach
            </div>

        </div>
    </div>



@endsection

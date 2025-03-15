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
        'next' => route('gallery.sd'),
        'titles' => ['MATERI PEMBELAJARAN'],
    ])

    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">📚 Sub Materi Belajar Lalu Lintas</h1>

            <div class="grid lg:grid-cols-2 gap-6">
                @foreach ($datas as $index => $data)
                    @include('components.list-subject', [
                        'number' => $loop->iteration,
                        'title' => $data->name,
                        'href' => route('sub-subject-detail.sd', $data->id),
                    ])
                @endforeach
            </div>
        </div>
    </div>


@endsection

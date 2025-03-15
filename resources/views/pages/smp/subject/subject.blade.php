@extends('layouts.layout-base')
@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-2.jpg') . ');';
@endphp
@section('menulist')
    <li><a href="{{ route('dashboard.smp') }}">Beranda</a></li>
    <li><a href="{{ route('goal.smp') }}">Tujuan</a></li>
    <li><a href="{{ route('subject.smp') }}">Materi</a></li>
    <li><a href="{{ route('gallery.smp') }}">Galeri</a></li>
    <li><a href="{{ route('quiz.smp') }}">Quiz</a></li>
@endsection
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
        'titles' => ['MATERI PEMBELAJARAN'],
    ])

    <div class="w-full px-5 lg:px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">📚 Materi Belajar Lalu Lintas</h1>

            <div class="grid lg:grid-cols-2 gap-6">
                @foreach ($datas as $index => $data)
                    @include('components.list-subject', [
                        'number' => $loop->iteration,
                        'title' => $data->name,
                        'href' => route('subject-detail.smp', $data->id),
                    ])
                @endforeach
            </div>
        </div>
    </div>


@endsection

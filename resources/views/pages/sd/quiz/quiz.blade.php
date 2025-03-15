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
            'titles' => ['Ayo Quizz !!'],
        ])
    </div>
    @include('components.next-prev', [
        'prev' => route('dashboard.sd'),
        // 'next' => route('subject'),
        'titles' => ['Ayo Quizz !!'],
        'nextHide' => 'pointer-events-none opacity-50 cursor-not-allowed',
    ])
    <div class="w-full px-44 mt-10 pb-10">
        <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
            <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">📚 Quiz Quizz Lalu Lintas</h1>

            <div class="grid grid-cols-1 gap-6">
                @foreach ($datas as $data)
                    @include('components.list-subject', [
                        'number' => $loop->iteration,
                        'title' => $data->name,
                        'href' => route('question.sd', $data->id),
                        'done' => true,
                    ])
                @endforeach
            </div>
        </div>
    </div>
@endsection

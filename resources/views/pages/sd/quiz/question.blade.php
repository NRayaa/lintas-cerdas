@extends('layouts.layout-base')
@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-1.jpg') . ');';
@endphp

@section('background', $background)
@section('text-white', 'text-white')

@section('content')
    <div class="flex justify-center px-5 lg:px-0 md:hidden text-center w-full">
        @include('components.title', [
            'titles' => ['Semangat Ngerjain Quizznyaa !!'],
        ])
    </div>
    @include('components.next-prev', [
        'prev' => route('dashboard.sd'),
        // 'next' => route('subject'),
        'titles' => ['Semangat Ngerjain Quizznyaa !!'],
        'nextHide' => 'pointer-events-none opacity-50 cursor-not-allowed',
    ])
    <form action="{{ route('quiz.submit', ['quiz' => $title->id]) }}" method="POST">
        @csrf
        <div class="w-full px-5 lg:px-44 mt-10 pb-10">
            <div class="border-4 border-gray-800 bg-yellow-200 py-6 px-8 rounded-lg shadow-lg">
                <h1 class="text-3xl font-bold text-gray-900 text-center mb-6">📚 {{ $title->name }}</h1>

                <div class="grid grid-cols-1 gap-6">
                    @foreach ($datas as $data)
                        @include('components.option', [
                            'nomor' => $loop->iteration,
                            'question_id' => $data->id,
                            'soal' => $data->name,
                            'options' => [
                                'a' => $data->a,
                                'b' => $data->b,
                                'c' => $data->c,
                                'd' => $data->d,
                            ],
                        ])
                    @endforeach
                </div>

                <div class="w-full flex justify-end pt-10">
                    <button type="submit" class="btn">
                        <span class="text">Kumpulkan Quiz</span>
                    </button>
                </div>
            </div>
        </div>
    </form>

@endsection

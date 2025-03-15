@extends('layouts.layout-base')
@php
    $background = 'background-image: url(' . asset('storage/assets/bg/bg-2.jpg') . ');';
@endphp

@section('background', $background)

@section('content')
    <div class="flex justify-between items-center w-full pt-10">
        @include('components.icon-side', [
            'class' => 'lg:pl-10',
            'path' => 'storage/assets/svg/home/traffic-light-1.svg',
            'size' => 'w-40 h-auto',
            'animation' => 'transition-transform duration-500 hover:animate-swing-scale'
        ])
        <div class="text-center ">
            @include('components.title', [
                'titles' => ['AYO BELAJAR', 'LALU LINTAS SMP'],
            ])
        </div>
        @include('components.icon-side', [
            'class' => 'lg:pr-10',
            'path' => 'storage/assets/svg/home/traffic-light-1.svg',
            'size' => 'w-40 h-auto',
            'animation' => 'transition-transform duration-500 hover:animate-swing-scale'
        ])
    </div>
    <div class="lg:flex justify-center px-10 lg:px-20 pt-10 pb-10">
        <div class=" bg-blue-800 py-5 lg:py-10 border-[5px] border-blue-400 rounded-3xl">
            <div class="md:flex px-16 gap-10 bg-blue-400 py-5 space-y-5 lg:space-y-0 justify-between items-center">
                @include('components.menu-icon', [
                    'href' => route('goal.smp'),
                    'image' => 'storage/assets/svg/home/goal-1.svg',
                    'title' => 'Tujuan',
                ])
                @include('components.menu-icon', [
                    'href' => route('subject.smp'),
                    'image' => 'storage/assets/svg/home/subject-1.svg',
                    'title' => 'Materi',
                ])
                @include('components.menu-icon', [
                    'href' => route('gallery.smp'),
                    'image' => 'storage/assets/svg/home/gallery-1.svg',
                    'title' => 'Galeri',
                ])
                @include('components.menu-icon', [
                    'href' => route('quiz.smp'),
                    'image' => 'storage/assets/svg/home/game-1.svg',
                    'title' => 'Quiz',
                ])
                @include('components.menu-icon', [
                    'href' => route('profile.smp'),
                    'image' => 'storage/assets/svg/home/profile-1.svg',
                    'title' => 'Profil',
                ])
            </div>

        </div>
    </div>
@endsection

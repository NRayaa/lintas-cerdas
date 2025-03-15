@extends('layouts.layout-base-sma')
@section('content')
    <div class="flex items-center justify-center mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full">
            <div class="w-full">
                @include('components.sma.title', ['title' => 'GALERI PEMBELAJARAN'])
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 p-5">
                @foreach ($datas as $image)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg w-full h-auto" src="{{ asset('storage/' . $image->img) }}" alt="" />
                        </a>
                        <div class="p-5">
                            <div>
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{$image->name}}</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">
                                {{$image->content}}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

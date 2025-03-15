@extends('layouts.layout-base-sma')
@section('content')
    <div class="flex items-center justify-center mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full py-5">
            <div class="w-full">
                @include('components.sma.title', ['title' => 'QUIZ PEMBELAJARAN'])
            </div>
            <div class="w-full p-5">
                <div class="p-5 border border-b-1 border-gray-200 dark:border-gray-700">
                    <div class="flex flex-col space-y-4">
                        @foreach ($datas as $data)
                            <a href="{{ route('question.sma', ['id' => $data->id]) }}"
                                class="w-full p-4 flex items-center gap-5 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                                <h1 class="text-lg font-lg">{{ $loop->iteration }}</h1>
                                <h5 class="text-lg font-semibold tracking-tight text-gray-900 dark:text-white">{{ $data->name }}
                                </h5>
                                {{-- <p class="font-normal text-gray-700 dark:text-gray-400">{{ $materi['desc'] }}</p> --}}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

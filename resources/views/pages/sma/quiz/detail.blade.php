@extends('layouts.layout-base-sma')
@section('content')
    <div class="flex items-center justify-center mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full py-5">
            <div class="w-full">
                @include('components.sma.title', ['title' => $title->name])
            </div>
            <div class="w-full p-5">
                <div class="p-5 border border-b-1 border-gray-200 dark:border-gray-700">
                    <form action="{{route('quiz.submit.sma', ['quiz' => $title->id])}}" method="POST">
                        @csrf

                        <div class="flex flex-col space-y-4">
                            @foreach ($datas as $data)
                                @include('components.sma.option', [
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

                        <div class="mt-5 flex justify-end">
                            <button type="submit"
                                class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

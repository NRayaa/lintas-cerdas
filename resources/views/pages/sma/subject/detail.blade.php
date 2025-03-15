@extends('layouts.layout-base-sma')
@section('content')
    <div class="flex items-center justify-center mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full py-5">
            <div class="w-full">
                @include('components.sma.title', ['title' => $data->name])
            </div>
            <div class="py-5 px-5">
                <div class="w-full prose list-disc list-decimal">
                    @if ($data)
                        {!! $data->content !!}
                    @else
                        <span style="color: red;">Data tidak tersedia</span>
                    @endif
                </div>
            </div>
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-5 p-5">
                @foreach ($dataImages as $image)
                    <div
                        class="max-w-sm bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-800 dark:border-gray-700">
                        <a href="#">
                            <img class="rounded-t-lg w-full object-cover" src="{{asset('storage/' . $image->img)}}" alt="" />
                        </a>
                        <div class="p-5">
                            <div>
                                <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 dark:text-white">{{$image->name}}</h5>
                            </div>
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{
                                $image->content
                                }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

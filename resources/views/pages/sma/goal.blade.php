@extends('layouts.layout-base-sma')
@section('content')
    <div class="flex items-center justify-center mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full px-5">
            <div class="w-full">
                @include('components.sma.title', ['title' => 'TUJUAN PEMBELAJARAN'])
            </div>
            <div class="w-full prose list-disc list-decimal">
                @if ($data)
                    {!! $data->content !!}
                @else
                    <span style="color: red;">Data tidak tersedia</span>
                @endif
            </div>
        </div>
    </div>
@endsection

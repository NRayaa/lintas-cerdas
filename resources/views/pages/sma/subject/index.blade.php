@extends('layouts.layout-base-sma')
@section('content')
    <div class="flex items-center justify-center mb-4 rounded-sm bg-gray-50 dark:bg-gray-800">
        <div class="w-full px-5 py-5">
            <div class="w-full">
                @include('components.sma.title', ['title' => 'MATERI PEMBELAJARAN'])
            </div>


            <div id="accordion-collapse" class="py-5" data-accordion="collapse">
                @foreach ($datas as $index => $data)
                    @include('components.sma.accordion', [
                        'id' => $index + 1,
                        'title' => $data->name, // Sesuaikan dengan nama kolom di database
                        'subMateri' => $data->smaSubSubjects->map(function ($sub) {
                                return [
                                    'title' => $sub->name, // Sesuaikan dengan nama kolom sub materi
                                    // 'desc' => $sub->description, // Sesuaikan dengan nama kolom sub materi
                                    'link' => route('sub-subject-detail.sma', ['id' => $sub->id]), // Sesuaikan dengan rute yang digunakan
                                ];
                            })->toArray(),
                        'isLast' => $loop->last,
                    ])
                @endforeach

            </div>



        </div>

    </div>
@endsection

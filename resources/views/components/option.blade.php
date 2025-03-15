<div class="w-full py-6 rounded-md bg-white">
    <div class="px-6 pb-3 flex items-center">
        <span class="text-2xl font-bold text-gray-800 mr-4">{{ $nomor }}.</span>
        <span class="text-lg font-semibold text-gray-900">{{ $soal }}</span>
        {{-- <input type="text" value="{{$question_id}}" hidden> --}}
    </div>
    <div class="grid lg:grid-cols-2 gap-6 px-6">
        @foreach ($options as $key => $option)
            <label class="flex items-center space-x-3 cursor-pointer">
                <input type="radio" name="answer[{{ $question_id }}]" value="{{ $key }}" class="form-radio h-5 w-5 text-blue-600">
                <span class="text-lg font-medium text-gray-900">{{ strtoupper($key) }}. {{ $option }}</span>
            </label>
        @endforeach
    </div>
</div>

<div class="w-full p-4 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
    <h1 class="text-lg font-semibold text-gray-900 dark:text-white mb-3">{{ $loop->iteration }}.
        {{ $soal }}</h1>
    <div class="space-y-2">
        @foreach ($options as $key => $option)
            <label
                class="flex items-center gap-2 p-3 bg-gray-100 dark:bg-gray-700 rounded-lg cursor-pointer hover:bg-gray-200 dark:hover:bg-gray-600">
                <input type="radio" name="answer[{{ $question_id }}]" value="{{ $key }}" class="">
                <span class="text-gray-900 dark:text-white">{{ strtoupper($key) }}. {{ $option }}</span>
            </label>
        @endforeach
    </div>
</div>

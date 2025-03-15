<a href="{{ $href ?? '#' }}"
    class="p-6 bg-white rounded-lg shadow-md transform transition duration-300 hover:scale-105 hover:shadow-xl flex justify-between items-center">
    <div class="flex gap-5">
        <span class="text-2xl font-bold text-gray-800 mr-4">{{ $number ?? '1' }}.</span>
        <span class="text-lg font-semibold text-gray-900">{{ $title ?? 'Judul Materi' }}</span>
    </div>
    <div>
        @if ($data->done)
            <span class="text-sm font-medium text-green-600 bg-green-100 px-3 py-1 rounded-full">Done</span>
        @endif
    </div>
</a>

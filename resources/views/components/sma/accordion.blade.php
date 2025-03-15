@props(['id', 'title', 'subMateri' => []])

<h2 id="accordion-collapse-heading-{{ $id }}">
    <button type="button"
        class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-1 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3"
        data-accordion-target="#accordion-collapse-body-{{ $id }}"
        aria-expanded="false"
        aria-controls="accordion-collapse-body-{{ $id }}">
        <span class="font-bold">{{ $title }}</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true"
            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="M9 5 5 1 1 5" />
        </svg>
    </button>
</h2>
<div id="accordion-collapse-body-{{ $id }}" class="hidden" aria-labelledby="accordion-collapse-heading-{{ $id }}">
    <div class="p-5 border border-b-1 border-gray-200 dark:border-gray-700">
        <div class="flex flex-col space-y-4">
            @foreach ($subMateri as $materi)
                <a href="{{ $materi['link'] }}"
                    class="block w-full p-4 bg-white border border-gray-200 rounded-lg shadow hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-700 dark:hover:bg-gray-700">
                    <h5 class="mb-2 text-lg  tracking-tight text-gray-900 dark:text-white">{{ $materi['title'] }}</h5>
                    {{-- <p class="font-normal text-gray-700 dark:text-gray-400">{{ $materi['desc'] }}</p> --}}
                </a>
            @endforeach
        </div>
    </div>
</div>

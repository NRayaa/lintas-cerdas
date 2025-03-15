<a href="{{ $href ?? '#' }}" class="group flex flex-col items-center text-center">
    <img src="{{ asset($image ?? 'storage/assets/svg/home/goal-1.svg') }}"
        class="w-32 h-auto transition-transform duration-300 group-hover:scale-110" alt="">
    <h2 class="text-[1.5rem] font-bold text-gray-800 transition-colors duration-300 group-hover:text-blue-500">
        {{ $title ?? 'Tujuan' }}
    </h2>
</a>

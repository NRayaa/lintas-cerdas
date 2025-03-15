<div class="flex justify-between items-center w-full pt-10">
    <a href="{{ $prev ?? '#' }}" class="{{ $prevHide ?? ''}}">
        @include('components.icon-side', [
            'class' => 'lg:pl-14',
            'path' => 'storage/assets/svg/all/left-arrow.svg',
            'size' => 'w-20 h-auto',
            'animation' => 'transition-transform duration-300 hover:scale-110',
        ])
    </a>
    <div class="text-center hidden md:block">
        @include('components.title', [
            'titles' => $titles ?? [],
        ])
    </div>
    <a href="{{ $next ?? '#' }}" class="{{ $nextHide ?? ''}}">
        @include('components.icon-side', [
            'class' => 'lg:pr-14',
            'path' => 'storage/assets/svg/all/right-arrow.svg',
            'size' => 'w-20 h-auto',
            'animation' => 'transition-transform duration-300 hover:scale-110',
        ])
    </a>
</div>

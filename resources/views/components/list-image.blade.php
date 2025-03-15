<div class="bg-white rounded-lg shadow-md overflow-hidden break-inside-avoid">
    <img src="{{ asset('storage/'.$image) ?? 'https://source.unsplash.com/400x250/?education' }}" alt="Galeri" class="w-full h-56 object-cover">
    <div class="p-4">
        <h2 class="text-xl font-semibold text-gray-800">{{ $title ?? 'Judul Materi' }}</h2>
        <p class="text-gray-600">{{ $description ?? 'Deskripsi materi' }}</p>
    </div>
</div>

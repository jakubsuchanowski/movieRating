<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filmy') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach($movies as $movie)
                    <div class="bg-white shadow rounded-lg overflow-hidden">
                        <img src="{{ asset('storage/' . $movie->image_path) }}" alt="{{ $movie->title }}" class="w-full h-48 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg font-semibold">{{ $movie->title }}</h3>
                            <p class="text-gray-600">Rok: {{ $movie->year }}</p>
                            <p class="text-gray-600">Czas trwania: {{ $movie->duration }} min</p>
                            <p class="mt-2 text-gray-800">{{ $movie->description }}</p>
                            <p class="mt-2 text-yellow-500">Ocena: {{ number_format($movie->averageRating(), 1) }} / 5</p> 
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
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
                            @php
                           
                             $isFavorite = auth()->check() && auth()->user()->favourites && auth()->user()->favourites->contains($movie->id);
                            @endphp
                            <form action="{{route('favourites.add',$movie->id)}}" method=POST style="display: inline;">
                            @csrf
                            <button type="submit" class="favorite-btn" style="background: none; border: none; cursor: pointer;">
                                <i class="fa {{ $isFavorite ? 'fa-heart' : 'fa-heart-o' }}" style="color: {{ $isFavorite ? 'red' : 'gray' }};"></i>
                            </button>
                            </form>
                            <p class="text-gray-600">Rok: {{ $movie->year }}</p>
                            <p class="text-gray-600">Czas trwania: {{ $movie->duration }} min</p>
                            <p class="mt-2 text-gray-800">{{ $movie->description }}</p>
                            <p class="mt-2 text-yellow-500">Ocena: {{ number_format($movie->averageRating(), 1) }} / 5</p>
                            @if($movie->hasRated)
                                <span class="inline-block mt-2 bg-gray-500 text-white px-4 py-2 rounded">Ocenione</span>
                            @else
                            <a href="{{ route('rate.create', $movie->id) }}" class="inline-block mt-2 bg-blue-500 text-white px-4 py-2 rounded">Dodaj ocenę</a>
                            @endif
                            <a href="{{ route('comments.show', $movie->id)}}" class="inline-block mt-2 bg-blue-500 text-white px-4 py-2 rounded">Komentarze</a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-app-layout>
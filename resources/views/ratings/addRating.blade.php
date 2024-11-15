<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Oceń film: ' . $movie->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('rate.store', $movie->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="rating" class="block text-sm font-medium text-gray-700">Ocena (1-5 gwiazdek):</label>
                        <div class="flex space-x-2 mt-2 rating">
                            @for($i = 1; $i <= 5; $i++)
                                <input type="radio" id="star{{ $i }}" name="rating" value="{{ $i }}" class="hidden" required>
                                <label for="star{{ $i }}" class="cursor-pointer text-2xl">★</label>
                            @endfor
                        </div>
                    </div>
                    <div>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                            Dodaj ocenę
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>

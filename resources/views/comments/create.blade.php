<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dodaj komentarz dla filmu: ' . $movie->title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                <form method="POST" action="{{ route('comments.store', $movie->id) }}">
                    @csrf
                    <div class="mb-4">
                        <label for="comment" class="block text-sm font-medium text-gray-700">Komentarz:</label>
                        <textarea id="comment" name="comment" rows="4" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm"></textarea>
                    </div>
                    <div>
                        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">
                            Dodaj komentarz
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
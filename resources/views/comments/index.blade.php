<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Komentarze dla filmu: '. $movie->title) }}
            </h2>
            <a href="{{ route('comments.create', $movie->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Dodaj komentarz</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-md rounded-lg p-4">
                @if($comments->isEmpty())
                    <p class="text-gray-500">Brak komentarzy do wyświetlenia.</p>
                @else
                    @foreach($comments as $comment)
                        <div class="mb-4 p-4 border-b border-gray-200">
                            <p class="font-semibold">{{ $comment->user->name }}</p>
                            <p class="text-gray-600">{{ $comment->comment }}</p>
                            <p class="text-sm text-gray-500">{{ $comment->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</x-app-layout>

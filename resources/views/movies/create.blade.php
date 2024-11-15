
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Filmy') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                <section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Dodaj nowy film') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Wypelnij wszystkie wymagane pola.') }}
        </p>
    </header>

    <form method="post" action="{{ route('movie.store') }}" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('post')

        <div>
            <x-input-label for="title" :value="__('Tytuł filmu')" />
            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" autocomplete="title" />
            
        </div>
        <div>
            <x-input-label for="movie_genre" :value="__('Gatunek filmu')" />
            <x-text-input id="movie_genre" name="movie_genre" type="text" class="mt-1 block w-full" autocomplete="movie_genre" />
            
        </div>
        <div>
            <x-input-label for="director" :value="__('Reżyser')" />
            <x-text-input id="director" name="director" type="text" class="mt-1 block w-full" autocomplete="director" />
            
        </div>

        <div>
            <x-input-label for="year" :value="__('Rok powstania')" />
            <x-text-input id="year" name="year" type="text" class="mt-1 block w-full" autocomplete="year" />
            
        </div>

        <div>
            <x-input-label for="duration" :value="__('Długość trwania')" />
            <x-text-input id="duration" name="duration" type="text" class="mt-1 block w-full" autocomplete="duration" />
            
        </div>
        <div>
            <x-input-label for="description" :value="__('Opis filmu')" />
            <x-text-input id="description" name="description" type="text" class="mt-1 block w-full" autocomplete="description" />
            
        </div>
        <div>
            <x-input-label for="image" :value="__('Zdjęcie okładki')" />
            <input id="image" name="image" type="file" class="mt-1 block w-full" />
            
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Zapisz') }}</x-primary-button>
        </div>
    </form>
</section>
                </div>
            </div>
        </div>
    </div>
    
</x-app-layout>

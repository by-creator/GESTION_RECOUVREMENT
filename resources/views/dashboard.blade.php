<x-app-layout>
    <x-slot name="body">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Accueil') }}
        </h2>
    </x-slot>

    @include('layouts.table')
   
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-2xl text-gray-900">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center min-h-[60vh] bg-gray-50">
        <div class="bg-white rounded-xl shadow-lg p-8 w-full max-w-md text-center">
            <h3 class="text-lg font-semibold text-gray-800 mb-2">
                {{ __("You're logged in!") }}
            </h3>
            <p class="text-gray-500">Selamat datang di dashboard aplikasi Anda.</p>
        </div>
    </div>
</x-app-layout>

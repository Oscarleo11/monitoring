<x-guest-layout>
    <!-- Logo UBA -->
    {{-- <div class="flex justify-center mb-6">
        <img src="{{ asset('storage/logo-uba-bank.png') }}" alt="UBA Logo" class="h-16">
    </div> --}}

    <form method="POST" action="{{ route('register') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Name -->
        <div class="mb-4">
            <x-input-label for="name" :value="__('Nom')" class="text-red-700" />
            <x-text-input id="name" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2 text-red-600" />
        </div>

        <!-- Email Address -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-red-700" />
            <x-text-input id="email" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Mot de passe')" class="text-red-700" />
            <x-text-input id="password" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Confirm Password -->
        <div class="mb-4">
            <x-input-label for="password_confirmation" :value="__('Confirmez le mot de passe')" class="text-red-700" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md" type="password" name="password_confirmation" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-600" />
        </div>

        <!-- Lien et bouton -->
        <div class="flex items-center justify-between">
            <a class="underline text-sm text-gray-600 hover:text-red-700" href="{{ route('login') }}">
                {{ __('Déjà inscrit ?') }}
            </a>

            <x-primary-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500">
                {{ __('Créer un compte') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

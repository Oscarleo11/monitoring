<x-guest-layout>
    <!-- Logo centré -->
    {{-- <div class="flex justify-center mb-6">
        <img src="{{ asset('storage/logo-uba-bank.png') }}" alt="UBA Logo" class="h-16">
    </div> --}}

    <!-- Session Status -->
    <x-auth-session-status class="mb-4 text-red-600" :status="session('status')" />

    <!-- Formulaire -->
    <form method="POST" action="{{ route('login') }}" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf

        <!-- Email -->
        <div class="mb-4">
            <x-input-label for="email" :value="__('Email')" class="text-red-700" />
            <x-text-input id="email" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-600" />
        </div>

        <!-- Password -->
        <div class="mb-4">
            <x-input-label for="password" :value="__('Mot de passe')" class="text-red-700" />
            <x-text-input id="password" class="block mt-1 w-full border-red-300 focus:border-red-500 focus:ring-red-500 rounded-md" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-600" />
        </div>

        <!-- Remember Me -->
        <div class="block mb-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded border-red-300 text-red-600 shadow-sm focus:ring-red-500" name="remember">
                <span class="ms-2 text-sm text-gray-600">{{ __('Se souvenir de moi') }}</span>
            </label>
        </div>

        <!-- Bouton et lien -->
        <div class="flex items-center justify-between">
            @if (Route::has('password.request'))
                <a class="underline text-sm text-gray-600 hover:text-red-700" href="{{ route('password.request') }}">
                    {{ __('Mot de passe oublié ?') }}
                </a>
            @endif

            <x-primary-button class="bg-red-600 hover:bg-red-700 focus:ring-red-500">
                {{ __('Connexion') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

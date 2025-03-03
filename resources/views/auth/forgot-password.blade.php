<x-guest-layout>
    <div class="mb-4 text-sm text-white">
        {{ __('Vous avez oublié votre mot de passe ? Pas de problème. Il vous suffit de nous indiquer votre adresse e-mail et nous vous enverrons un lien de réinitialisation de mot de passe qui vous permettra de choisir un nouveau mot de passe.') }}
    </div>

    <!-- Statut de la session -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <!-- Adresse e-mail -->
        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4 rounded-lg" style="background-color: #ffb700;">
            <x-primary-button>
                {{ __('Envoyer le lien de réinitialisation du mot de passe') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

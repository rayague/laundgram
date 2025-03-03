<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Merci de vous être inscrit ! Avant de commencer, pouvez-vous vérifier votre adresse e-mail en cliquant sur le lien que nous venons de vous envoyer ? Si vous n\'avez pas reçu l\'email, nous serons heureux de vous en envoyer un autre.') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 text-sm font-medium text-green-600">
            {{ __('Un nouveau lien de vérification a été envoyé à l\'adresse e-mail que vous avez fournie lors de votre inscription.') }}
        </div>
    @endif

    <div class="flex items-center justify-between mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button>
                    {{ __('Renvoyer l\'e-mail de vérification') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}" style="background-color: #ffb700;">
            @csrf

            <button type="submit"
                class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Se déconnecter') }}
            </button>
        </form>
    </div>
</x-guest-layout>

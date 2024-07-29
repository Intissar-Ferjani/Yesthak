<section class="space-y-6">
    <header>
        <h2 class="text-xl font-medium text-gray-100">
            {{ __('Supprimer votre compte ?') }}
        </h2>
        
        <p class="mt-4 text-sm text-gray-300">
            {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.') }}
        </p>
        <p class=" text-sm text-gray-300">
            {{ __('Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.') }}
        </p>
    </header>

    <div x-data="">
        <input type="submit" class="buttonSupp" value="Supprimer compte" style="width: 350px; margin: auto; display: flex; flex-direction: column; align-items: center; text-align: center; margin-top:40px;" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
    </div>
    

    <x-modal name="confirm-user-deletion" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-6">
            @csrf
            @method('delete')

            <h2 class="text-lg font-medium text-gray-400">
                {{ __('Êtes-vous sûr de vouloir supprimer votre compte?') }}
            </h2>

            <p class="mt-1 text-sm text-gray-500">
                {{ __('Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées. Veuillez entrer votre mot de passe pour confirmer que vous souhaitez supprimer définitivement votre compte.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input
                    id="password"
                    name="password"
                    type="password"
                    class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}"
                    style="color: black"
                />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Annuler') }}
                </x-secondary-button>

                <x-danger-button class="ms-3">
                    {{ __('Supprimer le compte') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>
</section>

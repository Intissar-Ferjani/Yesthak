<section>
    <style>
        i{
            margin: 5px
        }
    </style>
    <header>
        <h2 class="text-lg font-medium text-gray-200">
            <i class="fa-solid fa-lock" style="margin: 10px"></i> {{ __('Mettre à jour le mot de passe') }}
        </h2>

        <p class="mt-1 text-sm text-gray-300">
            {{ __('Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.') }}
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div style="margin-bottom: 40px">
            <label for="update_password_current_password" >{{ __('Mot de passe actuel') }}</label>
            <input id="update_password_current_password" name="current_password" type="password" autocomplete="current_password"/>
        </div>

        <div style="margin-bottom: 40px">
            <label for="update_password_current_password" >{{ __('Nouveau mot de passe') }}</label>
            <input id="update_password_password" name="password" type="password" />
        </div>

        <div style="margin-bottom: 40px">
            <label for="update_password_password_confirmation" >{{ __('Confirmez le mot de passe') }}</label>
            <input id="update_password_password_confirmation" name="password_confirmation" type="password" class="mt-1 block w-full" autocomplete="new-password" />
        </div>

        <div style="display: flex; flex-direction: column; align-items: center; text-align: center; margin-top:40px">
            <input type="submit" value="Sauvegarder"/>
        
            @if (session('status') === 'Profil mis à jour')
                <div class="alert alert-success" style="margin-bottom: 5px;">
                    <ul style="margin-bottom: 0;">
                        <li>{{ __('Profil mis à jour.') }}</li>
                    </ul>
                </div>
            @endif
        </div>
        
    </form>
</section>
















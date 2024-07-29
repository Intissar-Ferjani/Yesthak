<section>
    <style>
        i{
            margin: 5px;
        }
    </style>
    <header>
        <h2 class="text-xl font-medium text-gray-200">
            <i class="fa-regular fa-user" style="margin: 10px"></i> {{ __('Informations sur le profil') }}
        </h2>
        <p class="mt-3 text-sm text-gray-300">
            {{ __("Mettez à jour les informations de profil et l'adresse e-mail de votre compte.") }}
        </p>
    </header>

    {{-- error-message display  --}}
    <div>
        @if($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 5px;">
                <ul style="margin-bottom: 0;">
                    @foreach($errors->all() as $error)
                        <li style="list-style-type: none;">Identifiants non valides</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>            
    {{-- ---------------------- --}}

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="mt-3">
            <label for="name" >{{ __('Nom et Prénom') }}</label>
            <input id="name" name="name" type="text" class="mt-1 block w-full" value="{{Auth::user()->name}}" required autofocus autocomplete="name" />
        </div>
        <br>
        <div class="col-8 col-10-xsmall mt-3">
            <label for="dateNaiss" >{{ __('Date de naissance') }}</label>
            <input type="date" name="dateNaiss" id="dateNaiss" class="form-control" value="{{Auth::user()->dateNaiss}}" required autocomplete="dateNaiss"/>
        </div>
        <br>
        <div class="col-8 col-10-xsmall mt-3">
            <label for="gouvernorat" >{{ __('Gouvernorat') }}</label>
            <input type="text" name="gouvernorat" id="gouvernorat" class="form-control" value="{{Auth::user()->gouvernorat}}"/>
        </div>
        <br>
        <div class="col-8 col-10-xsmall mt-3">
            <label for="telephone" >{{ __('Téléphone portable') }}</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{Auth::user()->telephone}}"  maxlength="8"/>
        </div>
        <br>
        <div class="col-8 col-10-xsmall mt-3">
            <label for="email" >{{ __('Email') }}</label>
            <input id="email" name="email" type="email" class="mt-1 block w-full" value="{{Auth::user()->email}}" required autocomplete="username" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __("Votre adresse e-mail n'est pas vérifiée.") }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __("Cliquez ici pour renvoyer l'e-mail de vérification.") }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('Un nouveau lien de vérification a été envoyé à votre adresse e-mail.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div style="display: flex; justify-content: center; align-items: center; margin-top:50px">
            <input type="submit" value="Sauvegarder"/>
        </div>
        

        <div class="flex items-center gap-4">
            

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Enregistré.') }}</p>
            @endif
        </div>
    </form>
</section>

@extends('layout')

@section('content')
{{menu('Home', 'my_home');}}
    <section class="wrapper style1 special fade-up">
        <div class="Maincontainer">
            <header class="major">
                <h2>Inscription <i class="fa-solid fa-file-signature"></i></h2>
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

            <div class="box alt">
                <form method="POST" action="{{ route('register') }}" class="cta">
                    @csrf

                    <div class="row gtr-uniform gtr-50" style="padding-left: 150px">
                        <div class="col-8 col-10-xsmall">
                            <input type="text" name="name" id="name" class="form-control" placeholder="Nom et Prénom" required/>   
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="date" name="dateNaiss" id="dateNaiss" class="form-control" value="{{ old('dateNaiss') }}" required autocomplete="dateNaiss" placeholder="Date de naissance | jj/mm/aaaa"/>
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="text" name="gouvernorat" id="gouvernorat" class="form-control" value="{{ old('gouvernorat') }}"  placeholder="Gouvernorat"/>
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ old('telephone') }}"  maxlength="8"  placeholder="Téléphone portable"/>
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}" required autocomplete="email" placeholder="Email"/>
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="password" name="password" id="password" class="form-control" required autocomplete="new-password" placeholder="Mot de passe"/>
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required autocomplete="new-password" placeholder="Confirmer Mot de passe"/>
                        </div>

                        <div class="col-8 col-10-xsmall">
                            <div style="display: flex; margin-top:20px">
                                <p style="margin-right: 5px;">J'accepte toutes les conditions </p>
                                <label class="switch"><input type="checkbox" name="conditions" {{ old('conditions') ? 'checked' : '' }}><span class="slider round"></span></label>
                            </div>
                        </div>
                    </div>

                    <div class="row gtr-uniform gtr-50" style="padding-left: 150px; padding-top:20px;">
                        <div class="col-8 col-10-xsmall" ><input type="submit" value="Se connecter" class="fit primary" /></div>
                    </div>

                    <div style="margin-top: 20px ; margin-right:10px">
                        <p>J'ai déjà un <a href="{{ route('login') }}"><b>compte</b></a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection


@extends('layout')

@section('content')
{{menu('Home', 'my_home');}}
    <section class="wrapper style1 special fade-up">
        <div class="Maincontainer">
            <header class="major">
                <h2>Connecter</h2>
                <p style="font-size: 18px">Renseignez vos identifiants <i style="margin: 4px" class="fa-solid fa-id-card-clip"></i></p>
            </header>

            <div class="box alt">
                {{-- error-message display  --}}
                <div>
                    @if($errors->any())
                        <div class="alert alert-danger" style="margin-bottom: 5px;">
                            <ul style="margin-bottom: 0;">
                                @foreach($errors->all() as $error)  
                                    <li style="list-style-type: none; padding-left:0">Identifiants non valides</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>            
                {{-- ---------------------- --}}

                <form method="POST" action="{{route('login')}}" class="cta">
                    @csrf
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="row gtr-uniform gtr-50" style="padding-left: 165px">
                        <div class="col-8 col-10-xsmall">
                            <input type="email" name="email" id="email" class="form-control" required autocomplete="email" autofocus placeholder="Email"/>
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="password" name="password" id="password" class="form-control" required autocomplete="current-password" placeholder="Mot de passe"/>
                        </div>
                    </div>

                    <div class="row gtr-uniform gtr-50" style="padding-left: 165px; padding-top:20px;">
                        <div class="col-8 col-10-xsmall" ><input type="submit" value="Se connecter" class="fit primary" /></div>
                    </div>

                    <div style="margin-top: 20px; margin-left: 10px;">
                        <p>Vous n'avez pas encore de compte?<br><a href="{{route('register')}}"><b>Inscrivez-vous ici</b></a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

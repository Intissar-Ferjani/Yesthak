@extends('layout')

@section('content')
{{menu('Home', 'my_home');}}
    <section class="wrapper style1 special fade-up">
        <div class="Maincontainer">
            <header class="major">
                <h2>Connecter - Admin <i class="fa-solid fa-user-gear"></i></h2>
            </header>
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
            <div class="box alt">
                <form method="POST" action="{{ route('admin_guest.admin-login') }}" class="cta">
                    @csrf
                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <div class="row gtr-uniform gtr-50" style="padding-left: 165px">
                        <div class="col-8 col-10-xsmall">
                            <input type="email" name="email" id="email" placeholder="Email" required />
                        </div>
                        <div class="col-8 col-10-xsmall">
                            <input type="password" name="password" id="password" placeholder="Mot de passe" required />
                        </div>
                    </div>
                    <div class="row gtr-uniform gtr-50" style="padding-left: 165px; padding-top:20px;">
                        <div class="col-8 col-10-xsmall"><input type="submit" value="Se connecter" class="fit primary" /></div>
                    </div>
                    <div style="margin-top: 20px">
                        <p>Pas un Admin?<br><a href="{{ route('login') }}"><b>Continuer en tant qu'utilisateur</b></a></p>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection

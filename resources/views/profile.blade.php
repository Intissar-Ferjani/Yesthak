@extends('layout')

@section('content')
<title>Yesthak</title>
<x-app-layout>
    <main>
        <style>
            table {
                margin-left: 590px;
                width: 345px;
            }

            td {
                padding: 10px;
                cursor: pointer;
            }

            h2{
                font-size: 38px;
                color: whitesmoke;
                margin-bottom: 12px;
            }
        </style>
        <section class="wrapper style1 special fade-up">
            <div class="box alt">
                <header class="major">
                    <h2>Profil</h2>
                </header>

                <!-- Display validation messages -->
                <div>
                    @if(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <!-- End validation -->
                
                <table>
                    <tr>
                        <td onclick="window.location.href='{{ route('viewPots') }}'" ><i class="fa-solid fa-wallet" style="margin: 10px"></i> Mes cagnottes </td>
                    </tr>
                    <tr>
                        <td onclick="window.location.href='{{ route('viewSupported') }}'" ><i class="fa-solid fa-hand-holding-heart" style="margin: 10px"></i> Mes Participations </td>
                    </tr>
                    <tr>
                        <td onclick="window.location.href='{{ route('profile.editInfo') }}'"><i class="fa-regular fa-user" style="margin: 10px"></i> Mes informations </td>
                    </tr>
                    <tr>
                        <td onclick="window.location.href='{{ route('profile.edit') }}'"><i class="fa-solid fa-lock" style="margin: 10px"></i> Sécurité </td>
                    </tr>
                    <tr>
                        <td><i class="fa-solid fa-address-card" style="margin: 10px"></i> Documents d'identité </td>
                    </tr>
                </table>    
            </div>
        </section>
        
    </main>
</x-app-layout>
    
@endsection


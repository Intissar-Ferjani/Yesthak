@extends('layout')

@section('content')
<x-app-layout>
    <main>
        {{-- session-message display --}}
        <div>
            @if(session()->has('status'))
                <div class="alert alert-success" style="margin-bottom: 5px;">
                    <ul style="margin-bottom: 0;">
                        <li>{{ __('Enregistré.') }}</li>
                    </ul>
                </div>
            @endif
        </div>
        {{-- ---------------------- --}}

        <div class="edit-container">
            @include('profile.partials.update-password-form')
            <hr>
            <div class="edit-del-container shadow">
                @include('profile.partials.delete-user-form')
            </div>
        </div>
        
        
    </main>
</x-app-layout>
@endsection
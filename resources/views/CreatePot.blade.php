@extends('layout')
@section('content')
<title>Yesthak</title>
<div>
    {{menu('Home', 'my_home');}}
    @livewire('CreationCagnotte')
    
</div>
@endsection
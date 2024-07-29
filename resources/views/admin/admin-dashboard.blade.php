@extends('layout')

@section('content')
<title>Yesthak</title>
<x-app-layout>
    <main>
        <div class="my_container">
            <div class="box-container">
                <p onclick="window.location.href='{{ route('categories.index') }}'">Explorer les Catégories</p>
            </div>
        
            <div class="box-container">
                <p onclick="window.location.href='{{ route('cagnottes.index') }}'">Explorer les Cagnottes</p>
            </div>
        </div>
        
    </main>
</x-app-layout>
@endsection

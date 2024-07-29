@extends('layout')

@section('content')
<title>Yesthak</title>
<x-app-layout>
    <main>
        <section class="wrapper style1 special fade-up">

                <!-- Display validation messages -->
                <div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                <b>{{ $error }}</b>
                            @endforeach
                        </div>     
                    @elseif(session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif
                </div>
                <!-- End validation -->
                
                <div class="carouselSection">
                    <div class="carousel__wrapper">
                      <h1 class="carousel__header">Mes Cagnottes</h1>
                      <div class="carousel__nav">
                        <span onclick="window.location.href='{{ route('CreatePot') }}'" class="customCarouselNavItem">
                            <i class="fa-solid fa-plus-circle fa-2xl"></i>
                        </span> 
                        <div class="carousel__nav__item" data-direction="prev">
                          <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none">
                            <path stroke="currentColor" stroke-width="1.5" d="M15.525 18.966L8.558 12l6.967-6.967"></path>
                          </svg>
                        </div>
                        <div class="carousel__nav__item" data-direction="next">
                            <svg aria-hidden="true" focusable="false" viewBox="0 0 24 24" role="img" width="24px" height="24px" fill="none">
                                <path stroke="currentColor" stroke-width="1.5" d="M8.474 18.966L15.44 12 8.474 5.033"></path>
                            </svg>
                        </div>
                        </div>
                        <div class="carousel">
                            @foreach ($pots as $pot)
                                <div class="carousel__item carousel__item--pot">
                                    <div>
                                        <label for="file-input">
                                            <img id="img-preview" class="customImgCarousel" src="{{ Storage::url($pot->photo) }}" onclick="window.location.href='{{ route('cagnotte.edit', $pot->id) }}'"/>
                                        </label>
                                        <div class="carousel__item__name">{{$pot->title}}</div>
                                        @if($pot->status == 'closed')
                                            <div class="closed-label">Fermée</div>
                                        @else
                                            <span style="color: #15161c00; padding-top:6px">Lorem Ipsum</span>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div> 
            </section>
        </main>
    </x-app-layout>
@include('scriptCarousel')
@endsection



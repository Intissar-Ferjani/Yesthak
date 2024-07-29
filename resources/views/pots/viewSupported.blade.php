@extends('layout')

@section('content')
<title>Yesthak</title>
<x-app-layout>
    <main>
        <div class="list-support">
            <span class="customCarouselNavItem" style="padding-bottom: 5px !important; margin-left: 15px">
                <a href="{{ route('showSupport') }}"> Voir les Causes <i class="fa-solid fa-heart-circle-plus" style="margin: 2px"></i> </a>
            </span> 
        </div>
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
            
            <!--  Cards  -->
            <div class="card-category-5">
                <div class="category-name">Mes Participations</div> <br/><br/>
                <ul class="all-pr-cards row gtr-uniform" style="margin-left: 150px">
                    @foreach ($supports as $support)
                    <li>
                        <div class="per-card-3 col-4 col-6-medium col-12-xsmall portfolio-item">
                            <div class="card-image">
                                <span></span>
                                <img id="img-preview" class="customImgCarousel" src="{{ Storage::url($support->cagnotte->photo) }}" style="border:0 !important ; outline:0 !important"/>
                            </div>

                            <div class="card-content">
                                <span style="font-size: 18px">{{ $support->cagnotte->title }}</span>
                                <div class="card-text">
                                    <span style="font-size: 16px">Montant supporté: {{ $support->supported_amount }} DT</span><br>
                                    <span style="color: #15161c00">Lorem Ipsum is simply dummy text of the printing and typesetting industry..........................................</span>

                                </div>
                                <div class="social-icons">
                                    @if ($support->cagnotte->status == 'open')
                                        <span>Veuillez modifier ce montant ? </span>
                                        <form action="{{ route('updateSupport', ['id' => $support->id]) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="col-3">
                                                <input class="effect-3" type="text" name="supported_amount" placeholder="DT" dir="rtl" style="width:150px; font-size:16px; text-align: right;" value="{{ $support->supported_amount }}" required>
                                                <span class="focus-border" style="width:140px ; background-color : #ad374b; display: block;"></span>
                                            </div>
                                            
                                            <div class="card-btn">
                                                <button type="submit" title="Mettre à jour" >Mettre à jour</button>
                                            </div>
                                        </form>
                                    @else
                                        <span>Cette Cagnotte est actuellement fermée , vous ne pouvez plus le supporter.</span>
                                    @endif                       
                                </div>
                            </div>                  
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </section>  
    </main>
</x-app-layout>

<script>
    function showText(toggleText) {
        toggleText.classList.toggle("active");
    }
</script>
@endsection

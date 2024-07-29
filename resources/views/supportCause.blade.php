@extends('layout')

@section('content')
<title>Yesthak</title>
<div style="display: flex; justify-content: right; margin-right: 40px !important">
    <div>{{ menu('Home', 'my_home') }}</div>
    <div>
        <span onclick="window.location.href='{{ route('profile') }}'">
            <i class="fa-solid fa-address-card fa-xl" style="color: #e13652; margin-top:32px; cursor: pointer;"></i>
        </span>
    </div>
</div>


<section class="wrapper style1 special fade-up">
    <div class="box alt">
        <!-- Display validation and search messages -->
        <div class="validation-section">
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
        <!-- End validation and search messages -->
        
        <div style="display: flex ; margin-left:120px">
            <form class="d-flex" id="searchForm" role="search" method="GET" action="{{ route('search') }}" >
                <div class="searchCause">
                    <input type="text" placeholder="Rechercher une cause ..." id="searchInput">
                    <div class="searchbtn-src">
                        <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                 </div>
            </form>
    
            {{-- ----- filter ---------------------------------}}    
            <div class="typeselect-menu">
                <div class="typeselect">
                    <span>Filtrer par catégorie</span>
                    <i class="fas fa-angle-down" style="padding: 5px"></i>
                </div>
                <div class="typeoptions-list">
                    <div class="typeoption">Afficher toutes les catégories</div>
                    @foreach ($categories as $category)
                        <div class="typeoption">{{ $category }}</div>
                    @endforeach
                </div>
            </div>
            {{-- -------------------------------------------- --}}
        </div>

        <section class="supportwrapper">
            <main class="titlerow">
                <ul>
                    <li><i class="fa-solid fa-images fa-xl"></i></li>
                    <li>Titre de Cagnotte</li>
                    <li>Montant à atteindre</li>
                    <li>Participer à la cause</li>
                    <li></li>
                </ul>
            </main>
            @foreach ($pots as $pot)
                @if ($pot->status == 'open')
                    
                    <div class="form-container" data-category="{{ $pot->category->name }}">
                        <form method="POST" action="{{ route('storeSupport', ['cagnotte_id' => $pot->id]) }}" style="padding:0; margin:0">
                        @csrf
                            <input type="hidden" name="cagnotte_id" value="{{ $pot->id }}">
                            <article class="supportrow nfl">
                                <ul style="display: flex; align-items: center;">
                                    <li><img src="{{ Storage::url($pot->photo) }}" style="width:72px;height:68px; border-radius: 50%;"></li>
                                    <li>{{ $pot->title }}</li>
                                    @if (  $pot->amount  ){
                                        <li>{{ $pot->amount }} DT</li>
                                    }
                                    @else
                                        <li>Montant non spécifié</li>
                                    @endif
                                    <li><i class="fa-solid fa-heart fa-lg supportIcon" style="cursor: pointer;"></i></li>
                                    <li class="supportFieldContainer"></li>
                                </ul>
                                <ul class="more-content" style="max-height: 400px; overflow-y: scroll;">
                                    <li>{{ $pot->description }}</li>
                                </ul>
                            </article>
                        </form>
                    </div>
                @endif
            @endforeach
        </section>
    </div>
</section>
@include('scriptSupport')

@endsection

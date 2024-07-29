<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    
@extends('layout')

@section('content')
    <div id="page-wrapper">
    <header id="header" class="transparent">
        <nav id="nav">
            <ul>
                <li><a href="{{route('home')}}">Accueil</a></li>
                <li>
                    <a href="#qui">Qui sommes nous?</a>
                    <ul>
                        <li><a href="#three">Nos garanties</a></li>
                        <li><a href="#contact">Contact</a></li>
                    </ul>
                </li>
                <li><a href="#categories">Catégories</a></li>
                <li><a href="{{route('profile')}}" class="button primary"><i class="fa-solid fa-circle-user"></i></a></li>
                <li><a href="{{route('admin_guest.admin-login')}}" class="button primary"><i class="fa-solid fa-user-gear"></i></a></li>
            </ul>
        </nav>
    </header>
    </div>
    <!-- Banner -->
    <section id="banner"  >
        <div class="content">
            <header>
                <h2>Solidarité Tunisienne en Action</h2>
                <p><span style="margin: 8px">Donnez Souffle, Faites Différence, Unis pour la Tunisie</span></p>
                <br>
                <a href="{{ route('CreatePot') }}" class="button" style="margin-right:15px"><i class="fa-solid fa-circle-plus" style="margin: 2px"></i> Créer une cagnotte</a>
                <a href="{{ route('showSupport') }}" style="margin-right:15px" class="button"><i class="fa-solid fa-heart-circle-plus" style="margin: 2px"></i> Soutenir une cause</a>
            </header>
            <span class="image fit"><img src="images/pic01.jpg" alt="" style="width: 100%;" /></span>
        </div>
        <a href="#one" class="goto-next scrolly">Next</a>
    </section>

    <!-- One -->
    <section id="qui" class="spotlight style1 bottom">
        <span class="image fit main"><img src="images/pic02.jpg" alt="" /></span>
        <div class="content">
            <div class="Maincontainer">
                <div class="row">
                    <div class=" col-12-medium">
                        <header>
                            <h2>Qui sommes nous?</h2>
                            <p>Yesthak est une plateforme de collecte de fonds en ligne qui vise à faciliter le financement de projets et d'événements de toutes sortes. Nous sommes une équipe passionnée qui croit en la puissance de la collaboration et de la générosité pour réaliser des projets concrets.</p>
                        </header>
                    </div>
                </div>
            </div>
        </div>
        <a href="#two" class="goto-next scrolly">Next</a>
    </section>

    <!-- Two -->
    <section id="two" class="spotlight style2 right">
        <span class="image fit main"><img src="images/pic03.jpg" alt="" /></span>
        <div class="content">
            <header>
                <h2>Donnez de l'élan à vos projets avec Yesthak !</h2>
                <p style="font-size: 19px">Envie de lancer une collecte simple, sécurisée et accessible à toutes et tous ? Avec Yesthak, quelques clics suffisent !</p>
            </header>
            <p style="font-size: 17px">Pour toutes les occasions, créez une cagnotte qui vous ressemble et collectez rapidement des fonds pour un besoin personnel comme anniversaire, un pot de départ, un mariage ou un projet solidaire. Simplifiez vos dépenses à plusieurs !</p>
            <ul class="actions" style="margin-bottom: 20px;">
                <li><a href="{{route('commentMarche')}}" class="button">Comment ça marche</a></li>
            </ul>            
        </div>
        <a href="#three" class="goto-next scrolly">Next</a>
    </section>

    <!-- Three -->
    <section id="three" class="spotlight style3 left">
        <span class="image fit main bottom"><img src="images/pic04.jpg" alt="" /></span>
        <div class="content">
            <header>
                <h2>Sécurité absolue</h2>
                <p style="font-size: 19px">Yesthak garantit la sécurité totale de vos collectes de fonds, veillant à ce que chaque contribution parvienne en toute sécurité aux bénéficiaires légitimes.</p>
            </header>
            <p style="font-size: 17px">Les fonds collectés sont sécurisés sur un compte dédié par notre Prestataire de Service de Paiement, vous garantissant une utilisation exclusive sans aucune génération de revenus pour Yesthak. Nos paiements sont effectués via un protocole SSL/TLS, garantissant le cryptage de vos données bancaires, avec des validations supplémentaires telles que les confirmations par SMS pour les dépenses, pour assurer la sécurité totale de chaque transaction.</p>
        </div>
        <a href="#four" class="goto-next scrolly">Next</a>
    </section>

    <!-- Four -->
    <section id="categories" class="wrapper style1 special fade-up">
        <div class="Maincontainer">
            <header class="major">
                <h2>Les Catégories</h2>
            </header>
            <div class="box alt">
                <div class="row gtr-uniform">
                    @foreach ($cruds as $category)
                        <div class="col-4 col-6-medium col-12-xsmall portfolio-item">
                            <input type="text" value="{{$category->id}}" style="display: none;">
                            <span class="{{$category->icon}}"></span>
                            <h3>{{$category->name}}</h3>
                            <p>{{$category->details}}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Five -->
    <section id="contact" class="wrapper style2 special fade">
        <div class="Maincontainer">
            <header>
                <h2>Contactez le service à la clientèle</h2>
            </header>
            <form method="post" action="{{ route('store.email') }}" class="cta">
                @csrf
                <div class="row gtr-uniform gtr-50">
                    <div class="col-8 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Votre adresse e-mail" /></div>
                    <div class="col-4 col-12-xsmall"><input type="submit" value="Envoyer" class="fit primary" /></div>
                </div>
            </form>             
        </div>
    </section>
@endsection

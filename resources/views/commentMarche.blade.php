@extends('layout')
@section('content')
<title>Yesthak</title>
<header style="background-color: #e13652; margin-top:60px">
    <span style="padding: 1px; text-align:center"><h2 style="font-weight: 600">Comment ça marche <i class="fa-solid fa-question"></i></h2><p>Faciliter la générosité et vous aider à réaliser vos projets grâce à une cagnotte simple et sécurisée.</p></span>
</header>

<div style="margin-top:50px; ">
    <div class="step" style="padding-right:200px ; margin-left: 400px; margin-top: 80px">
        <div>
           <div class="circle"><i class="fa-solid fa-water fa-xl" style="margin-top: 25px"></i></div>
        </div>
        <div style="margin-left: 60px">
           <div class="title">Etape 1 : Précisez la nature du projet</div>
           <div class="caption" style="margin-top: 12px"> 
                Choisir la catégorie adaptée à votre collecte est important pour que nous vous guidions au mieux. S'il s'agit d'un projet solidaire, votre cagnotte pourra être référencée publiquement sur notre site avec les cagnottes de la même catégorie.
            </div>
        </div>
    </div>
    <div class="step" style="padding-right:200px ; margin-left: 400px; margin-top: 50px">
        <div>
           <div class="circle"><i class="fa-solid fa-feather-pointed fa-xl" style="margin-top: 25px"></i></div>
        </div>
        <div style="margin-left: 60px">
           <div class="title">Etape 2 : Personnalisez votre cagnotte</div>
           <div class="caption" style="margin-top: 12px"> 
                La personnalisation rend votre collecte plus attractive et augmente vos chances d'atteindre votre objectif. Donnez un nom à votre cagnotte, ajoutez une image, précisez sa durée, détaillez votre projet et la destination des dons collectés. Cette étape permet aussi à notre équipe conformité d'assurer le bon usage de ces dons.            
            </div>
        </div>
    </div>
    <div class="step" style="padding-right:200px ; margin-left: 400px; margin-top: 50px">
        <div>
           <div class="circle"><i class="fa-solid fa-users-viewfinder fa-xl" style="margin-top: 25px"></i></div>
        </div>
        <div style="margin-left: 60px">
           <div class="title">Etape 3 : Mobilisez votre communauté</div>
           <div class="caption" style="margin-top: 12px"> 
                Selon votre projet, invitez votre entourage proche à participer puis, élargissez à vos connaissances ou, partagez votre cagnotte auprès de votre communauté sur les réseaux sociaux. Donnez régulièrement des nouvelles de votre collecte directement sur la cagnotte pour tenir informés les donateurs.        
            </div>
        </div>
    </div>
    <div class="step" style="padding-right:200px ; margin-left: 400px; margin-bottom:100px; margin-top: 50px">
        <div>
           <div class="circle"><i class="fa-solid fa-coins fa-xl" style="margin-top: 25px"></i></div>
        </div>
        <div style="margin-left: 60px">
           <div class="title">Etape 4 : Dépensez les dons collectés</div>
           <div class="caption" style="margin-top: 12px"> 
                Dépensez simplement et rapidement l'argent collecté par virement bancaire, quand vous le souhaitez, en une ou plusieurs fois. Votre profil doit être vérifié et le bénéficiaire des dons clairement identifié. Selon les cagnottes, des documents complémentaires peuvent être demandés.     
            </div>
        </div>
    </div>
</div>

<div class="row gtr-uniform" style="display: flex; justify-content: center; align-items: center;">
    <span onclick="window.location.href='/'" style="padding-top: 100px; cursor: pointer; text-decoration: none;">
      <i class="fa-solid fa-circle-chevron-left fa-2xl" style="text-decoration: none;"></i>
    </span>
</div>


<style>
    .step {
        position: relative;
        min-height: 1em;
        color: whitesmoke;
        z-index: 999;
    }

    .title {
        line-height: 1.5em;
        font-weight: bold;
        font-size: 20px;
    }
    .caption {
        font-size: 0.95em;
    }

    .step + .step {
        margin-top: 3em;
    }

    .step > div:first-child {
        position: static;
        height: 0;
    }

    .step > div:not(:first-child) {
        margin-left: 1.5em;
        padding-left: 1em;
    }

    /* Circle */
    .circle {
        background: #e13652;
        position: relative;
        width: 3em; 
        height: 3em; 
        line-height: 3em; 
        border-radius: 100%;
        color: #fff;
        text-align: center;
        box-shadow: 0 0 0 6px #e13652; 
    }

    /* Vertical Line */
    .circle:after {
        content: ' ';
        position: absolute;
        display: block;
        top: 1px;
        right: 50%;
        bottom: 1px;
        left: 50%;
        height: 100%;
        width: 1px;
        transform: scale(1, 2);
        transform-origin: 50% -100%;
        background-color: #e13652;
        z-index: -1;
    }

    .step:last-child .circle:after {
        display: none
    }
</style>
@endsection

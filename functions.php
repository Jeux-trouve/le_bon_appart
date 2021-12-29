<?php
function connexionBDD()
{
    return new PDO('mysql:host=localhost;dbname=wf3_php_intermediaire_jessica;charset=utf8', 'root', '');
}

function afficherBarreNav()
{
    $res =
        '<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Le bon Appart</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link active" href="accueil.php">Accueil <span class="sr-only">(current)</span></a>
                    <a class="nav-item nav-link" href="consulter_toutes_les_annonces.php">Consulter toutes les annonces</a>
                    <a class="nav-item nav-link" href="ajouter_une_annonce.php">Ajouter une annonce</a>
                </div>
            </div>  
        </nav>';
    return $res;
}

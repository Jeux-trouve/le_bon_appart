<?php
require('functions.php');
$pdo = connexionBDD();
//on séléctionne les annonces dans l'ordre inverse des id et on en séléctionne 15
$requete = $pdo->query('SELECT * FROM advert ORDER BY id DESC LIMIT 15');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
</head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>

    <?= afficherBarreNav(); ?>


    <div class="d-flex justify-content-center">
        <img src="../../PHP/wf3_php_intermediaire_jessica_latge/images/logo.jpg" class="img-fluid" width="250px" alt="logo">
    </div>
    <h1 class="text-center">Le Bon Appart</h1>
    <h2 class="text-center">Plateforme d'annonces de location ou de ventes immobilières entre particuliers</h2><br />
    <div class="d-flex justify-content-center">
        <h3 class="text-danger"> Listes des annonces présentes sur le site</h3>
    </div>
    <br>

    <table class="table table-bordered table-dark">
        <tr>
            <td>id</td>
            <td>Titre de l'annonce</td>
            <td>Description de l'annonce</td>
            <td>Code postal du bien immobilier</td>
            <td>Ville du bien immobilier</td>
            <td>Type</td>
            <td>Prix</td>
            <td>Message de réservation</td>
        </tr>


        <?php
        //je récupère le tableau des données et j'utilise fetch qui nous renvoie la 1ere ligne
        while ($donnees = $requete->fetch()) {
        ?>
            <tr>
                <td><?= $donnees['id']; ?></td>
                <td><?= $donnees['title']; ?></td>
                <td><?= $donnees['description']; ?></td>
                <td><?= $donnees['postal_code']; ?></td>
                <td><?= $donnees['city']; ?></td>
                <td><?= $donnees['type']; ?></td>
                <td><?= $donnees['price']; ?></td>
                <td><?= $donnees['reservation_message']; ?></td>
            </tr>
        <?php
        }
        ?>
    </table>

    <!--cards-->
    <div class="row">
        <div class="card col-sm-6 bg-light">
            <img src="../../PHP/wf3_php_intermediaire_jessica_latge/images/bon_appart_img.jpg" class="card-img-top " alt="le bon appart">
            <div class="card-body">
                <h5 class="card-title">Actualités chez le Bon Appart</h5>
                <p class="card-text">Zoom sur nos annonces.</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="consulter_toutes_les_annonces.php"><input type="submit" value="Entrer" class="btn btn-danger" /></a>
            </div>
        </div>

        <div class="card col-sm-6 bg-danger">
            <img src="../../PHP/wf3_php_intermediaire_jessica_latge/images/bon_appart_img_1" class="card-img-top " alt="le bon appart">
            <div class="card-body">
                <h5 class="card-title">Espace Particuliers</h5>
                <p class="card-text">Comment ajouter son annonce !</p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
                <a href="ajouter_une_annonce.php"><input type="submit" value="Entrer" class="btn btn-light" /></a>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
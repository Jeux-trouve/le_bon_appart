<?php
require('functions.php');
$pdo = connexionBDD();
// requete pour avoir toutes les annonces
$requete = $pdo->query('SELECT * FROM advert ORDER BY id DESC');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter les annonces</title>
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

    <table class="table table-bordered table-secondary">
        <tr>
            <td>id</td>
            <td>Titre de l'annonce</td>
            <td>Description de l'annonce</td>
            <td>Code postal du bien immobilier</td>
            <td>Ville du bien immobilier</td>
            <td>Type</td>
            <td>Prix</td>
            <td>message de réservation</td>
            <td>Détails</td>
        </tr>
        <?php
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
                <td>
                    <?php
                    if (strlen($donnees['reservation_message']) > 0) {
                        echo '<span class="badge badge-success">RESERVE</span>';
                    } else {
                        echo '<span class="badge badge-danger"> NON RESERVE</span>';
                    }
                    ?>
                </td>
                <td>
                    <a href="consulter_une_annonce.php?id=<?= $donnees['id']; ?>" class="badge badge-dark">consulter une annonce</a>
                </td>

            </tr>
        <?php
        }
        ?>
    </table>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
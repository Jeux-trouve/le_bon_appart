<?php
//voir si il y a un get id
if (isset($_GET['id'])) {

    $id = (int)$_GET['id'];
    //mettre ici require + connexion bdd pour bien initialiser
    require('functions.php');
    $pdo = connexionBDD();

    if (!empty($_POST['reservation'])) {
        //L'utilisateur veut réserver cette annonce 
        $requete = $pdo->prepare('UPDATE advert SET reservation_message=:reservation_message WHERE id=:id');
        $res = $requete->execute([
            'reservation_message' => htmlspecialchars($_POST['reservation']),
            'id' => $id
        ]);
        if ($res) {
            echo 'Modification éffectuée !';
        } else {
            echo 'Une erreur est survenue.';
        }
    }

    $requete = $pdo->prepare('SELECT * FROM advert WHERE id=:id');
    $requete->execute([
        'id' => $id
    ]);
    $donnees = $requete->fetch();
} else {
    exit('OUT !');
}

$requete = $pdo->query('SELECT * FROM advert ORDER BY id DESC');

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulter une annonce</title>
</head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
    <?= afficherBarreNav(); ?>
    <h1>Détails de l'annonce</h1>
    <div class="card bg-light mx-auto" style="width: 30rem;">
        <img src="../../PHP/wf3_php_intermediaire_jessica_latge/images/bon_appart_img_1"" class=" card-img-top" alt="image annonce">
        <div class="card-body">
            <h5 class="card-title">Détails de l'annonce</h5>
            <p class="card-text">Titre de l'annonce : <?= $donnees['title']; ?></p>
            <p class="card-text">Description : <?= $donnees['description']; ?><br /></p>
            <ul class="list-group list-group-flush ">
                <li class="list-group-item">Code Postal : <?= $donnees['postal_code']; ?></li>
                <li class="list-group-item">Type : <?= $donnees['type']; ?></li>
                <li class="list-group-item">Prix : <?= $donnees['price']; ?></li>
            </ul>
            Message de réservation :
            <?php
            if (strlen($donnees['reservation_message']) > 0) {
                echo $donnees['reservation_message'];
            } else {
                echo '<span class="badge badge-danger">Annonce non réservée</span>';
            }
            ?><br />
            <?php
            if (strlen($donnees['reservation_message']) === 0) {
            ?>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Saisir un message de réservation</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="reservation"></textarea>
                    </div>

                    <button type="submit" class="btn btn-danger">je réserve</button>
                </form>
            <?php
            }
            ?>

        </div>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
<?php
//si traitement dit erreurs et succes

$erreurs = [];
$succes = "";
require('functions.php');
$pdo = connexionBDD();

//Pour savoir si l'utilisateur à envoyer le formulaire
if (!empty($_POST)) {
    //je récupère et sécurise les différents éléments
    $title = htmlspecialchars($_POST['title']);
    $description = htmlspecialchars($_POST['description']);
    $postal_code = htmlspecialchars($_POST['postal_code']);
    $city = htmlspecialchars($_POST['city']);
    $type = htmlspecialchars($_POST['type']);
    $price = htmlspecialchars($_POST['price']);

    //traitement
    if (empty($title)) {
        $erreurs[] = "Veuillez renseigner le titre.";
    }

    if (strlen($description) < 100) {
        $erreurs[] = "La description doit faire au moins 100 caractères.";
    }

    if (empty($postal_code)) {
        $erreurs[] = "Veuillez renseigner un code postal.";
    }
    if (empty($city)) {
        $erreurs[] = "Veuillez renseigner une ville.";
    }

    if ($type !== "vente" && $type !== "location") {
        $erreurs[] = "Le type doit être vente ou location.";
    }

    if (empty($price)) {
        $erreurs[] = "Le prix doit être indiqué.";
    }


    //si pas d'erreurs on fera ajout des données bdd
    if (count($erreurs) === 0) {
        $requete = $pdo->prepare('INSERT INTO advert (title, description, postal_code, city, type, price) VALUES(:title, :description, :postal_code, :city, :type, :price)');
        $res = $requete->execute([
            'title' => $title,
            'description' => $description,
            'postal_code' => $postal_code,
            'city' => $city,
            'type' => $type,
            'price' => $price,
        ]);
        if ($res) {
            $succes = "L'annonce' a bien été ajoutée.";
        } else {
            $erreurs[] = "Une erreur est survenue.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le bon Appart</title>
</head>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<body>
    <?= afficherBarreNav(); ?>

    <?php
    if (count($erreurs) > 0) {
        foreach ($erreurs as $e) {
            echo $e . '<br />';
        }
    }
    if ($succes) {
        echo $succes;
    }
    ?>


    <h1 class="text-danger">Ajouter une annonce</h1>
    <form action="" method="POST">

        Titre de l'annonce :<input type="text" name="title" /><br /><br />
        Description de l'annonce <textarea name="description"></textarea><br /><br />
        Code Postal du bien immobilier: <input type="number" name="postal_code" /><br /><br />
        Ville du bien immobilier: <input type="text" name="city" /><br /><br />
        Type d'annonce :
        <select name="type">
            <option value="vente">Vente</option>
            <option value="location">Location</option>
        </select>

        <br /><br />
        Prix : <input type="number" step="0.01" name="price" /><br /><br />

        <button type="submit" class="btn btn-outline-danger">Valider</button>




        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>
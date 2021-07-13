<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/traitement.css">
</head>
<body>

<?php

$errors = [];
$fichier = '';


if (!empty($_POST)) {
    $nom = strip_tags($_POST['name']);
} else {
    echo '<p>aucune données reçu</p>';
    die;
}

if (empty($nom) || strlen($nom) < 4) {
    $errors['name'] = "<p>Oups.. Il faut au moins 4 caractères :) </p>";
} else {
    $nom = htmlspecialchars($_POST['name']);
    $data['name'] = strip_tags($_POST['name']);
    header('Location:index.php');
}


if (!empty($errors)) {
    foreach ($errors as $error) {
        echo $error . '<br>';
        echo '<a href="index.php">Retour</a>';
    }
    die;
}


try {
    $bdd = new PDO('mysql:host=localhost;dbname=argonautes', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
$req = $bdd->prepare('INSERT INTO user(argonaute) VALUES(:argonaute)');
$req->execute(array(
    "argonaute" => $nom
));

?>


</body>
</html>
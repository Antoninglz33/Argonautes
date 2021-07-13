<?php


try {
    $bdd = new PDO('mysql:host=localhost;dbname=argonautes', 'root', '');
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}


$getid = (int)htmlspecialchars($_GET['id']);
$req = $bdd->exec("DELETE FROM user WHERE id = $getid");
header('Location:index.php');

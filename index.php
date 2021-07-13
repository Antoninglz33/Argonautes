<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Argonautes</title>
    <link rel="stylesheet" href="./assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="icon" type="image/png" href="assets/img/favicon.png" />

</head>
<body>
    <div class="container">
        <div class="img-bg">
            <div id="p-img">
                <p>Dans la mythologie grecque, les Argonautes (en grec ancien : Αργοναῦται / Argonaûtai) sont un groupe de héros qui partirent d'Iolcos, l'actuelle Volos, avec Jason à bord du navire Argo pour retrouver la Toison d'or. Ils apparaissent dans de nombreuses légendes. Selon les sources, leur nombre varie, mais la tradition rapporte que l'expédition était composée de 87 hommes en plus de Jason et d'une femme, Atalante, sans oublier Médée qui les rejoint par amour pour Jason. La mention la plus ancienne de l'expédition des Argonautes se trouve dans l’Odyssée (chant XII, vers 69 à 72), dans la bouche de Circé.</p>
            </div>
        </div>

        <div class="txt-cont">
            <div class="head">
                <h1>Les Argonautes</h1>
                <form action="create_argonaute.php" method="POST">
                    <input type="text" id="name" name="name" placeholder="Nom de l'Argonaute"> <br>
                    <input type="submit" href="index.php" id="submit" value="AJOUTER">
                </form>
            </div>

            <div class="liste">
                <div class="cont-list">
                    <h2>Membres de l'équipage</h2>
                    <div class="container-team">
                        <ul>
                            <?php
                            try {
                                $bdd = new PDO('mysql:host=localhost;dbname=argonautes', 'root', '');
                                $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            } catch (Exception $e) {
                                die('Erreur : ' . $e->getMessage());
                            }


                            $reponse = $bdd->query('SELECT id, argonaute FROM user');

                            while ($donnees = $reponse->fetch()) {
                            ?>
                                <li><?php echo $donnees['argonaute'];?> <a href="traitement_suppr.php?id=<?php echo $donnees['id'] ?>" class="delete"><i class="fas fa-times"></i></a></li>
                            <?php
                            }
                            
                            $reponse->closeCursor(); 
                            
                            ?>

                        </ul>
                    </div>
                </div>
                <h3>By Antonin Gonzalez</h3>
            </div>
        </div>
    </div>

    <script src="script.js"></script>
</body>
</html>
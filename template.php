<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/style.css" type="text/css">
    <?php 
        $tableau = array("banniere.jpg","banniere2.jpg","banniere.png","banniere3.jpg","banniere4.jpg");
        $i = rand(0,4);
        $banniere = $tableau[$i];
    ?>
    <style type="text/css">
        .bloc-1{
            background-image: url('assets/img/<?= $banniere ?>');
        }
    </style>
    <title><?= $title ?></title>
</head>
<body>
    <div class="main">
        <header>
            <a href="accueil"><img src="assets/img/logo.png" alt="Logo" title="Logo" /></a>
            <form action="search.php" method="get">
                <input type="text" name="recherche" placeholder="Votre recherche">
                <button type="submit" name="clic-search" class="btn">Rechercher</button>
            </form>
            <ul class="d-flex">
                <?php if(isset($_SESSION["admin"])){
                    echo '<li class="me-3"><a href="administration">Administration</a></li>';
                }
                ?>
                <li class="me-3"><a href="inscription">S'inscrire</a></li>
                <li><a href="connexion">Se connecter</a></li>
            </ul>
        </header>
        <div id="bloc-1" class="bloc-1"></div>
		
        <div class="container">
            <?= $content ?>
        </div>

        <footer class="footer text-center">
            <a href="admin">Administration</a><br><br>
            &copy; Copyright 2022 - Mes Gites
        </footer>

    </div>
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.js"></script>
    <script type="text/javascript">
        $("#clic-resa").click(function(){
            $("#reservation").slideDown("slow");
            $("#clic-resa").fadeOut();
        })
    </script>
</body>
</html>
<?php
/*
Auteur : Robin Laborde
Nom du projet : SiteDB
Description : site web tout simple qui utilise une base de donnée
Date de création : 24/08/2020
Version : 01
 */
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Maquette</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="styleSite.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <!-- En tête -->
        <header class="centrer">
            <!-- Menu -->
            <a id="accueil"><h1>Navigation</h1></a>
            <nav>
                <a href="accueil.php" class="nav">Accueil</a>
                <a href="informations.php" class="nav">Mon Projet</a>
                <a href="enregistrer.php" class="nav">S'enregistrer</a>
            </nav>
        </header>

        <!-- Partie contenu -->
        <main class="centrer">
            <!-- Me contacter -->
            <h2>Me Contacter :</h2>
            <p><u>Telephone : </u></p>
            <p>- 076 321 29 20 --> Suisse</p>
            <p>- +41 76 321 29 20 --> France</p>
            <p><u>Addresse mail : </u></p>
            <p>- robin.lbrd@eduge.ch</p>
            <p>- robin.laborde@neuf.fr</p>
        </main>

        <!-- Pied de page -->
        <footer class="centrer">
            <p>Robin E. Laborde CFPT-I</p>
        </footer>
    </body>
</html>

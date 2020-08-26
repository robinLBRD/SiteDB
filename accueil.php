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
        <title>Accueil</title>
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
                <a href="informations.php" class="nav">Mon Projet</a>
                <a href="enregistrer.php" class="nav">S'enregistrer</a>
                <a href="contacter.php" class="nav">Nous Contacter</a>
            </nav>
        </header>

        <!-- Partie contenu -->
        <main class="centrer">
            <h2>Bienvenue !</h2>
            <p><u>Ce site est relié à une base de donnée !</u></p>
        </main>

        <!-- Pied de page -->
        <footer class="centrer">
            <p>Robin E. Laborde CFPT-I</p>
        </footer>
    </body>
</html>


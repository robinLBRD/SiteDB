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
        <title>Informations</title>
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
                <a href="enregistrer.php" class="nav">S'enregistrer</a>
                <a href="contacter.php" class="nav">Nous Contacter</a>
            </nav>
        </header>

        <!-- Partie contenu -->
        <main class="centrer">
            <!-- Accueil -->
            <h2>Mon Projet :</h2>
            <h4><u>Description :</u></h4>
            <p>Je compte faire un projet html/C#/MySql/JavaScript et plus encore qui consiste à répertorier plusieurs composants nécessaires pour construire un pc, pouvoir faire des recherches de ces composants, pouvoir permettre à l’utilisateur de sélectionner différents composants pour assembler un pc et voir le prix final estimé, pouvoir ajouter au panier certain composant grâce à un compte utilisateur ou encore pouvoir noter les composants selon son expérience personnelle. Par la suite, je vais faire un formulaire pour se loguer en temps qu’utilisateur, une base de donnée travaillée et compréhensive.</p>
            <h4><u>Les langages de programmation utilisés</u></h4>
            <p>En tout, je vais utiliser 7 langages : Html, Css, Php, C#, MySql, Ajax et JavaScript.</p>
            <p>1. HTML : utilisé pour les fonctionnalités principales de mon site (les images, la barre de recherche, le formulaire, etc.).</p>
            <p>2. CSS : utilisé pour les couleurs, la taille, les positions, les bordures, etc. de la page entière.</p>
            <p>3. Php : /</p>
            <p>4. C# : /</p>
            <p>5. MySql : utilisé plus tard (2nd semestre) comme base de donnée pour stocké les composants, les avis, les choix, les informations des utilisateurs, etc.</p>
            <p>6. Ajax : /</p>
            <p>7. JavaScript : /</p>
        </main>

        <!-- Pied de page -->
        <footer class="centrer">
            <p>Robin E. Laborde CFPT-I</p>
        </footer>
    </body>
</html>
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="site.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <main>
            <nav>
                <a href='?controller=pages&action=home'>Home</a>
                <a href='?controller=posts&action=index'>Posts</a>
                <a href='?controller=users&action=login'>Se connecter</a>
            </nav>

            <?php require_once('inc/routes.inc.php'); ?>


        </main>
    </body>
    <footer>
        Robin E. Laborde CFPT-I
    </footer>
    <html>
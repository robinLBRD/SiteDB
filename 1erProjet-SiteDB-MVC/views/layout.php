<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//page principale sur laquelle toutes les infos seront affichés selon le controlleur et l'action choisie
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!--<link href="css/siteDB.css" rel="stylesheet" type="text/css"/>-->
        <style>
            body{
                width: auto;
                height: auto;
                background-repeat: no-repeat;
                background-size: cover;
            }
            header{
                width: 1000px;
                height: auto;
                background-color: beige;
                border-style: double;
                border-radius: 10px;
                color: saddlebrown;
                min-height: 136px;
            }
            main{
                margin-top: 10px;
                width: 1000px;
                height: auto;
                background-color: beige;
                border-style: double;
                border-radius: 10px;
            }
            footer{
                margin-top: 15px;
                padding-top: 20px;
                width: 1000px;
                height: auto;
                background-color: beige;
                border-style: double;
                border-radius: 10px;
                text-align: center;
                font-weight: bold;
                min-height: 38px;
            }
            .centrer{
                margin-left: auto;
                margin-right: auto;
            }
            nav{
                width: 1000px;
                display: flex;
                flex-direction: row;
                justify-content: center;
                align-items: center;
                border-bottom: solid black 1px;
            }
            .nav{
                width: 1000px;
                height: 40px;
                background-color: beige;
                text-align: center;
                margin-bottom: 10px;
                display: flex;
                justify-content: center;
                align-items: center;
                font-weight: bold;
            }
            h1{
                text-align: center;
                text-decoration: underline;
            }
            h2, h3, h4, h5, h6{
                margin-left: 5px;
            }
            p{
                margin-left: 15px;
                margin-right: 15px;
            }
            fieldset{
                margin-left: 15px;
                width: 450px;
                margin-bottom: 20px;
            }
            td{
                min-width: 220px;
            }
            legend{
                font-size: 20px;
                font-weight: bold;
            }
            input[type="submit"]{
                min-width: 100px;
                width: auto;
                margin-top: 5px;
                margin-bottom: 10px;
                margin-left: 10px;
            }
            input[type="date"]{
                width: 163px;
            }
            input[type="email"]{
                width: 193px;
            }
            select{
                width: 198px;
            }
            a{
                margin-top: 15px;
                margin-bottom: 15px;
                width: 150px;
                text-align: center;
            }
            a:hover{
                background-color: lightsteelblue;
                border-radius: 10px;
            }
            a:visited{
                color: black;
            }
            td{
                min-width: 250px;
            }
            .captcha{
                margin-left: 15px;
                margin-top: 15px;
            }
            .action{
                border : solid 1px black;
                padding: 5px 5px 5px 5px;
                text-decoration: none;
                color: black;
                margin-left: 5px;
                margin-bottom: 5px;
            }
            .label{
                margin-left: 10px;
            }
            .inputCreate{
                margin-left: 5px;
                margin-top: 2px;
                margin-bottom: 5px;
            }
        </style>
    </head>
    <body>
        <main class="centrer">

            <a id="accueil"><h1>Navigation</h1></a>
            <nav>
                <a href='?controller=pages&action=home'>Home</a>
                <a href='?controller=posts&action=index'>Posts</a>
                <a href='?controller=users&action=login'>Se connecter</a>
            </nav>
            <!-- appel du fichier inc/routes.inc.php qui vas afficher les informations en fonction du controlleur et l'action choisie -->
            <?php require_once('inc/routes.inc.php'); ?>

        </main>
    </body>
    <footer class="centrer">
        Robin E. Laborde I.FDA.P3C
    </footer>
    <html>
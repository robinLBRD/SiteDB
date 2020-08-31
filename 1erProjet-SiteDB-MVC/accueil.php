<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//page surlaquelle on arrive au tout début
require_once('inc/connection.inc.php');

//test pour savoir si il y a déja un controlleur ou une action présente dans l'url
if (isset($_GET['controller']) && isset($_GET['action'])) {
    //si oui alors on assigne à controlleur et à action les valeurs
    $controller = $_GET['controller'];
    $action = $_GET['action'];
} else {
    //sinon on met des valeurs par défaut pour afficher la page home
    $controller = 'pages';
    $action = 'home';
}

//session_start();

require_once('views/layout.php');
?>
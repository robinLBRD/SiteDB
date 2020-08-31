<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//controller des pages
class PagesController {

    //page d'accueil
    public function home() {
        //a faire : utiliser la session pour mettre le nom d'utilisateur connecté
        $prenom = 'Robin';
        $nom = 'Laborde';
        require_once('views/pages/home.php');
    }

    //si une erreur est rencontrée
    public function error() {
        require_once('views/pages/error.php');
    }

}

?>
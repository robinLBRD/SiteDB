<?php

/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//controlleur des "users"
class UsersController {

    //quand l'utilisateur se log in
    public function login() {
        require_once('views/users/login.php');
        //appel de la fonction verifyAcount pour savoir si le compte existe
        User::verifyAcount();

        //utilisation de la valeur retournée par la fonction
    }

}

<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

class User {

    //déclaration de 3 variables public qui s'apparentent au champs de la base de donnée
    //le public permaet d'acceder à la valeur de la variable directement : $user->user
    public $id;
    public $user;
    public $pwd;

    public function __construct($id, $user, $pwd) {
        //utilisation de $this-> car les variables ne sont pas static
        $this->id = $id;
        $this->user = $user;
        $this->pwd = $pwd;
    }

    //méthode de vérification de l'éxistance du compte rentré par l'utilisateur
    public static function verifyAcount() {
        if (isset($_POST["valider"])) {//si l'utilisateur appuye sur le bouton validé
            //récupération des valeurs de l'input
            $user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $list = [];
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM user WHERE user = :user AND pwd = :pwd'); //préparation de la requête de vérificaion
            $req->execute(array('user' => $user, 'pwd' => $pwd)); //éxécution de la requête avec les bonnes valeurs
            //renvoie de true ou false selon si le compte exsite ou non
            $users = $req->fetch();
            if ($users == false) {
                //return false;
                ?><p>Attention : ce compte n'éxiste pas ! Veuillez verifier le nom d'utilisateur ou le mot de passe rentré</p><?php
            } else {
                //return true;
                ?><p>Vous êtes connecté(e) ! Bienvenue.</p><?php
                /*
                  if (isset($_SESSION)) {
                  if (ini_get("session.use_cookies")) {
                  $params = session_get_cookie_params();
                  setcookie(session_name(), '', time() - 42000, $params["path"], $params["domain"], $params["secure"], $params["httponly"]
                  );
                  }
                  session_destroy();
                  session_start();
                  }
                  $_SESSION['logedIn'] = true;
                  $_SESSION['username'] = $user;
                  ?><p>Vous êtes connectés ! Bienvenue <?= $_SESSION['username'] ?>.</p><?php
                 */
            }
        }
    }

}
?>
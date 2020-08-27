<?php

class User {

    // we define 3 attributes
    // they are public so that we can access them using $User->user directly
    public $id;
    public $user;
    public $pwd;

    public function __construct($id, $user, $pwd) {
        $this->id = $id;
        $this->user = $user;
        $this->pwd = $pwd;
    }

    public static function verifyAcount() {
        if (isset($_POST["valider"])) {
            $user = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
            $pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $list = [];
            $db = Db::getInstance();
            $req = $db->prepare('SELECT * FROM user WHERE user = :user AND pwd = :pwd');
            $req->execute(array('user' => $user, 'pwd' => $pwd));
            $users = $req->fetch();
            if ($users == false) {
                ?><p>Erreur : ce compte n'éxiste pas !</p><?php
            } else {
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
            }
        }
    }

}
?>
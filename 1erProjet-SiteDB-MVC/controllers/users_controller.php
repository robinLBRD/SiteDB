<?php

class UsersController {

    public function login() {
        require_once('views/users/login.php');
        User::verifyAcount();
    }
}
    
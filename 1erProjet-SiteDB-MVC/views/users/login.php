<?php
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>
<form method="POST">
    <label for="username">Nom d'utilisateur :</label>
    <input type="text" name="username" value="<?= $username ?>"><br/>
    <label for="pwd">Mot de passe :</label>
    <input type="password" name="pwd" value="<?= $pwd ?>"><br/>
    <input type="submit" name="valider" value="Valider">
</form>
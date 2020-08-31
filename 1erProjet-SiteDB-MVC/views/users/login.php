<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */

//filtrage des valeurs des inputs pour ensuite les ré-affichers
$username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
$pwd = filter_input(INPUT_POST, "pwd", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
?>
<!-- formulaire de login -->
<h3>Connectez-vous !</h3>
<form method="POST">
    <label for="username" class="label">Nom d'utilisateur :</label><br>
    <input type="text" class="inputCreate" name="username" value="<?= $username ?>"><br>
    <label for="pwd" class="label">Mot de passe :</label><br>
    <input type="password" class="inputCreate" name="pwd" value="<?= $pwd ?>"><br>
    <input type="submit" name="valider" value="Valider">
</form>
<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */
?>
<!-- formulaire de création d'un post -->
<h3>Créez un post !</h3>
<form method="POST">
    <label for="auteur" class="label">Auteur :</label><br>
    <input type="text" class="inputCreate" id="auteur" name="auteur"><br/>
    <label for="objet" class="label">Objet :</label><br>
    <input type="text" class="inputCreate" id="objet" name="objet"><br/>
    <input type="submit" name="valider" value="Valider">
</form>

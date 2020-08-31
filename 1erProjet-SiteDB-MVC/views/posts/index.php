<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB-MVC
  Description : site web tout simple qui utilise une base de donnée et qui à une structure M.V.C.
  Version : 01
  Classe : I.FDA.P3C
 */
?>

<!-- listing des pots de la base de donnée -->
<h3>Voici la liste de tout les posts:</h3>

<?php
//session_start();
//parcour de tout les posts de $posts
foreach ($posts as $post) {
    ?>
    <p>
        <?php
        echo "<p>".$post->author."</p>";
        //if ($_SESSION['logedIn'] == true) {
        ?>
        <a class="action" href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Détail du post</a>
        <?php // } elseif ($_SESSION["username"] == "admin") {  ?>
                <!--<a href='?controller=posts&action=show&id=<?php // echo $post->id;   ?>'>Détail du post</a>-->
        <a class="action" href='?controller=posts&action=update&id=<?php echo $post->id; ?>'>Update le post</a>
        <a class="action" href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Supprimer le post</a>
    </p>
    <?php
    //}
}
//if ($_SESSION["logedIn"] == true) {
?>
    <br><a class="action" href='?controller=posts&action=create'>Créer un nouveau post</a><br><br>
<?php
// } ?>
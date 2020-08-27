<p>Here is a list of all posts:</p>

<?php 
session_start();
foreach ($posts as $post) { ?>
    <p>
        <?php
        echo $post->author;
        if ($_SESSION['logedIn'] == true) {
            ?>
            <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Détail du post</a>
        <?php } elseif ($_SESSION["username"] == "admin") { ?>
            <a href='?controller=posts&action=show&id=<?php echo $post->id; ?>'>Détail du post</a>
            <a href='?controller=posts&action=update&id=<?php echo $post->id; ?>'>Update le post</a>
            <a href='?controller=posts&action=delete&id=<?php echo $post->id; ?>'>Supprimer le post</a>
        </p>
        <?php
    }
}
if ($_SESSION["logedIn"] == true) {
    ?>
    <br/><a href='?controller=posts&action=create'>Créer un post</a>
<?php } ?>
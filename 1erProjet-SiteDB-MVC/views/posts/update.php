<p>Update un post !</p>
<form method="POST">
    <label for="auteur">Auteur :</label>
    <input type="text" id="auteur" name="auteur" value="<?php echo $post->author; ?>"><br/>
    <label for="objet">Objet :</label>
    <input type="text" id="objet" name="objet" value="<?php echo $post->content; ?>"><br/>
    <input type="submit" name="valider" value="Valider">
</form>

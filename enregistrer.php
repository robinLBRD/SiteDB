<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB
  Description : site web tout simple qui utilise une base de donnée
  Date de création : 24/08/2020
  Version : 01
 */
$filterNom = filter_input(INPUT_GET, 'Nom', FILTER_SANITIZE_STRING);
$filterEmail = filter_input(INPUT_GET, 'Email', FILTER_SANITIZE_STRING);
$filterObjet = filter_input(INPUT_GET, 'Objet', FILTER_SANITIZE_STRING);
$filterCommentaire = filter_input(INPUT_GET, 'Commentaire', FILTER_SANITIZE_STRING);

$varNom = filter_var($filterNom, FILTER_SANITIZE_STRING);
$varNom = filter_var($filterEmail, FILTER_VALIDATE_EMAIL);
$varObjet = filter_var($filterObjet, FILTER_SANITIZE_STRING);
$varCommentaire = filter_var($filterCommentaire, FILTER_SANITIZE_STRING);

if (!empty($_POST)) {
    require 'methodes/function.php';
    require_once 'methodes/db.php';
    $errors = array();

    if (empty($varNom) || !preg_match("/^[a-zA-Z0-9_]+$/", $varNom)) {
        $errors["Nom"] = "Votre pseudo est invalide ! (alphanumérique)";
    } else {
        $req = $pdo->prepare("SELECT idEnregistrement FROM enregistrement WHERE username = ?");
        $req->execute($varNom);
        $user = $req->fetch();
        if ($user) {
            $errors["username"] = "Ce pseudo est déjà pris";
        }
    }

    if (empty($varNom) || !filter_var($varNom, FILTER_VALIDATE_EMAIL)) {
        $errors["Email"] = "Votre email est invalide ! (alphanumérique)";
    } else {
        $req = $pdo->prepare("SELECT idEnregistrement FROM enregistrement WHERE email = ?");
        $req->execute($varNom);
        $user = $req->fetch();
        if ($user) {
            $errors["email"] = "Cet email est déjà utilisé pour un autre compte";
        }
    }

    if (empty($varObjet) || !preg_match("/^[a-zA-Z0-9' ]+$/", $varObjet)) {
        $errors["Objet"] = "Votre objet est invalide ! (alphanumérique)";
    }

    if (empty($varCommentaire) || !preg_match("/^[a-zA-Z0-9' ]+$/", $varCommentaire)) {
        $errors["Message"] = "Votre commentaire est invalide ! (alphanumérique)";
    }

    if (empty($errors)) {
        $rep = $pdo->prepare("INSERT INTO enregistrement SET username = ?, email = ?, objet = ?, commentaire = ?");
        $rep->execute($varNom, $varEmail, $varObjet, $varCommentaire);
    }
}
?>
<!DOCTYPE html>
<head>
    <title>Enregistrer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styleSite.css" rel="stylesheet" type="text/css"/>
</head>
<body>

    <!-- En tête -->
    <header class="centrer">
        <!-- Menu --> 
        <a id="accueil"><h1>Navigation</h1></a>
        <nav>
            <a href="accueil.php" class="nav">Accueil</a>
            <a href="informations.php" class="nav">Mon Projet</a>
            <a href="contacter.php" class="nav">Nous Contacter</a>
        </nav>
    </header>

    <!-- Partie contenu -->
    <main class="centrer">
        <!-- S'enregistrer -->
        <h2>S'enregistrer :</h2>
        <fieldset>
            <legend>Enregistrez-vous !</legend>
            <form action="enregistrer.php" method="POST">
                <label for="nom">Nom :</label>
                <p><input type="text" id="nom" placeholder="Laborde"  name="Nom" required="required"></p>
                <label for="email">Email :</label>
                <p><input type="text" id="email" placeholder="robin.lbrd@eduge.ch" name="Email" required="required"></p>
                <label for="objet">Objet :</label>
                <p><input type="text" id="objet" placeholder="Objet" name="Objet" required="required"></p>
                <label for="comm">Commentaire :</label>
                <p><input type="text" id="comm" placeholder="commentaire" name="Commentaire" required="required"></p>
                <button type="submit">Envoyer</button>
            </form>
        </fieldset>

        <p>Il y a une erreur de saisie</p>
        <?php
        if (!empty($errors)) {
            foreach ($errors as $error) {
                ?><p><?php
                    debug($error);
                }
            }
            ?>
        </p>
    </main>

    <!--Pied de page -->
    <footer class = "centrer">
        <p>Robin E. Laborde CFPT-I</p>
    </footer>
</body>
</html>
<?php
/*
  Auteur : Robin Laborde
  Nom du projet : SiteDB
  Description : site web tout simple qui utilise une base de donnée
  Date de création : 24/08/2020
  Version : 01
 */

session_start();

$filterNom = filter_input(INPUT_POST, 'Nom', FILTER_SANITIZE_STRING);
$filterEmail = filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
$filterObjet = filter_input(INPUT_POST, 'Objet', FILTER_SANITIZE_STRING);
$filterCommentaire = filter_input(INPUT_POST, 'Commentaire', FILTER_SANITIZE_STRING);
$filterMdp = filter_input(INPUT_POST, 'Mdp', FILTER_SANITIZE_STRING);
$filterConfMdp = filter_input(INPUT_POST, 'ConfMdp', FILTER_SANITIZE_STRING);

$varNom = filter_var($filterNom, FILTER_SANITIZE_STRING);
$varEmail = filter_var($filterEmail, FILTER_VALIDATE_EMAIL);
$varObjet = filter_var($filterObjet, FILTER_SANITIZE_STRING);
$varCommentaire = filter_var($filterCommentaire, FILTER_SANITIZE_STRING);
$varMdp = filter_var($filterMdp, FILTER_SANITIZE_STRING);
$varConfMdp = filter_var($filterConfMdp, FILTER_SANITIZE_STRING);

$click = 0;

if (!empty($_POST)) {
    require 'methodes/function.php';
    require_once 'methodes/db.php';
    $errors = array();

    if (empty($varNom) || !preg_match("/^[a-zA-Z0-9_]+$/", $varNom)) {
        $errors["Nom"] = "Votre pseudo est invalide !";
    } else {
        $req = $pdo->prepare("SELECT idEnregistrement FROM enregistrement WHERE username = ?");
        $req->execute(array($varNom));
        $user = $req->fetch();
        if ($user) {
            $errors["username"] = "Ce pseudo est déjà pris !";
        }
    }

    if (empty($varEmail) || !filter_var($varEmail, FILTER_VALIDATE_EMAIL)) {
        $errors["Email"] = "Votre email est invalide !";
    } else {
        $req = $pdo->prepare("SELECT idEnregistrement FROM enregistrement WHERE email = ?");
        $req->execute(array($varEmail));
        $user = $req->fetch();
        if ($user) {
            $errors["email"] = "Cet email est déjà utilisé";
        }
    }

    if (empty($varObjet) || !preg_match("/^[a-zA-Z0-9' ]+$/", $varObjet)) {
        $errors["Objet"] = "Votre objet est invalide !";
    }

    if (empty($varCommentaire) || !preg_match("/^[a-zA-Z0-9' ]+$/", $varCommentaire)) {
        $errors["Message"] = "Votre commentaire est invalide !";
    }

    if (empty($varMdp)) {
        $errors["password"] = "Vous devez entrer un mot de passe valide !";
    }

    if ($varMdp != $varConfMdp) {
        $errors["password"] = "Les deux mots de passes ne sont pas identiques !";
    }

    require('./recaptcha/autoload.php');
    if (isset($_POST['submit'])) {
        if (isset($_POST['g-recaptcha-response'])) {
            $recaptcha = new \ReCaptcha\ReCaptcha('6LfficMZAAAAANgi8MVIrRPc6T3phx_66ciiGXq1');
            $resp = $recaptcha->setExpectedHostname('localhost')
                    ->verify($_POST['g-recaptcha-response']);
            if ($resp->isSuccess()) {
            } else {
                $errors["captcha"] = "Veuillez validé le reCaptcha !";
            }
        } else {
            echo "</br>catcha non rempli</br>";
        }
    }

    if (empty($errors)) {
        $rep = $pdo->prepare("INSERT INTO enregistrement SET username = ?, email = ?, objet = ?, commentaire = ?, motDePasse = ?, confMotDePasse = ?");
        //$hashMdp = crypt($varMdp);
        //$hashConfmdp = crypt($varConfMdp);
        $hashMdp = password_hash($varMdp, PASSWORD_BCRYPT);
        $hashConfmdp = password_hash($varConfMdp, PASSWORD_BCRYPT);
        $rep->execute(array($varNom, $varEmail, $varObjet, $varCommentaire, $hashMdp, $hashConfmdp));
        $click++;
    } else {
        $click++;
    }
}
?>
<!DOCTYPE html>
<head>
    <title>Enregistrer</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="styleSite.css" rel="stylesheet" type="text/css"/>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                <p><input type="text" id="nom" placeholder="Laborde" value="<?= $varNom ?>" name="Nom" required="required"></p>
                <label for="email">Email :</label>
                <p><input type="text" id="email" placeholder="robin.lbrd@eduge.ch" value="<?= $varEmail ?>" name="Email" required="required"></p>
                <label for="objet">Objet :</label>
                <p><input type="text" id="objet" placeholder="Objet" value="<?= $varObjet ?>" name="Objet"></p>
                <label for="comm">Commentaire :</label>
                <p><input type="text" id="comm" placeholder="commentaire" value="<?= $varCommentaire ?>" name="Commentaire"></p>
                <label for="mdp">Mot de passe :</label>
                <p><input type="password" id="mdp" placeholder="mot de passe" value="<?= $varMdp ?>" name="Mdp" required="required"></p>
                <label for="confmdp">Confirmation du mot de passe :</label>
                <p><input type="password" id="confmdp" placeholder="mot de passe" value="<?= $varConfMdp ?>" name="ConfMdp" required="required"></p>
                <label for="captcha">Etes-vous un robot ?</label>
                <div class="captcha"><div class="g-recaptcha" id="captcha" data-sitekey="6LfficMZAAAAAFmbPP50iJrZjulsGa5rdfbi8btI"></div>
                </div><br/>
                <input type="submit" value="valider" name="submit">
            </form>
        </fieldset>

        <?php
        if ($click >= 1) {
            if (!empty($errors)) {
                $_SESSION['logedIn'] = false;
                $compteur = 0;
                foreach ($errors as $error) {
                    $compteur++;
                }
                if ($compteur > 1) {
                    ?><p>Attention, des erreurs ont été commises !</p><?php
                } else {
                    ?><p>Attention, une erreur a été commise !</p><?php
                }
                foreach ($errors as $error) {
                    debug($error);
                }
            } else {
                ?><p>Vous avez bien été enregistré !</p><?php
                $_SESSION['logedIn'] = true;
            }
        }
        ?>
    </main>

    <!--Pied de page -->
    <footer class = "centrer">
        <p>Robin E. Laborde CFPT-I</p>
    </footer>
</body>
</html>
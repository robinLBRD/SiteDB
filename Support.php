<?php
if (!empty($_POST)) {

    require '../HTML/Function.php';
    $errors = array();
    require_once '../HTML/db.php';

    if (empty($_POST["Nom"]) || !preg_match("/^[a-zA-Z0-9_]+$/", $_POST["Nom"])) {

        $errors["Nom"] = "Votre pseudo est invalide ! (alphanumérique)";
    } else {
        $req = $pdo->prepare("SELECT idEnregistrement FROM suggestion WHERE username = ?");
        $req->execute([$_POST["Nom"]]);
        $user = $req->fetch();
        if ($user) {
            $errors["username"] = "Ce pseudo est déjà pris";
        }
    }

    if (empty($_POST["Email"]) || !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {

        $errors["Email"] = "Votre email est invalide ! (alphanumérique)";
    } else {
        $req = $pdo->prepare("SELECT idEnregistrement FROM suggestion WHERE email = ?");
        $req->execute([$_POST["Email"]]);
        $user = $req->fetch();
        if ($user) {
            $errors["email"] = "Cet email est déjà utilisé pour un autre compte";
        }
    }

    if (empty($_POST["Objet"]) || !preg_match("/^[a-zA-Z0-9' ]+$/", $_POST["Objet"])) {

        $errors["Objet"] = "Votre objet est invalide ! (alphanumérique)";
    }

    if (empty($_POST["Message"]) || !preg_match("/^[a-zA-Z0-9' ]+$/", $_POST["Message"])) {

        $errors["Message"] = "Votre message est invalide ! (alphanumérique)";
    }

    if (empty($errors)) {
        $rep = $pdo->prepare("INSERT INTO suggestion SET username = ?, email = ?, objet = ?, message = ?");
        $rep->execute([$_POST["Nom"], $_POST["Email"], $_POST["Objet"], $_POST["Message"]]);
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
    <title>Games Seek : Support</title>
    <meta charset="UTF-8"/>
    <link href="../CSS/cssSite.css" rel="stylesheet" type="text/css"/>
    <link rel="icon" href="https://www.meinbergglobal.com/images/icons/svg/blue/user_headset.svg"> 
    <body class="w3-content" style="max-width:1200px">

        <!-- Sidebar/menu -->
        <nav class="w3-sidebar w3-bar-block w3-white w3-collapse w3-top" style="z-index:3;width:260px" id="mySidebar">
            <div class="w3-container w3-display-container w3-padding-16">
                <img class="w3-logo" src="../Image/GestionLogo.PNG" alt=""/>
            </div>
            <div class="w3-padding-64 w3-large w3-text-grey" style="font-weight:bold">
                <a href="../Accueil.php" class="w3-bar-item w3-button w3-fondLien">Accueil</a>
                <a href="Rechercher.php" class="w3-bar-item w3-button w3-fondLien">Recherche</a>
            </div>
        </nav>


        <header class="w3-bar w3-top w3-hide-large w3-black w3-xlarge">

        </header>


        <div>
            <!-- !PAGE CONTENT! -->
            <div class="w3-main" style="margin-left:250px">

                <!-- Push down content on small screens -->
                <div class="w3-hide-large" style="margin-top:83px"></div>

                <!-- Top header -->
                <header class="w3-container w3-xlarge">
                    <p class="w3-left w3-size">Support</p><br>
                    <br><?php if (!empty($errors)):endif; ?>
                    <div>
                        <p>Vous n'avez pas rempli le formulaire correctement</p>
                        <ul>
                            <?php
                            $errors = "";
                            foreach ($errors as $error):
                                ?>
                                <li><?= $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </header>

                <div id="footer">
                    <div>
                        <div style="width: 150px;">
                            <h4>Contact</h4>
                            <p>Des questions ?<br>Des suggestions de nouveaux jeux ?<br><b><u>N'hésitez pas !</u></b></p>
                            <form action="" method="post">
                                <p><input type="text" placeholder="Nom" name="Nom" required="required"></p>
                                <p><input type="text" placeholder="Email" name="Email" required="required"></p>
                                <p><input type="text" placeholder="Objet" name="Objet" required="required"></p>
                                <p><input type="text" placeholder="Message" name="Message" required="required"></p>
                                <button type="submit">Envoyer</button>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Pied de page -->
                <footer class="centrer">
                    <p>Robin E. Laborde CFPT-I</p>
                </footer>
            </div>
        </div>
    </body>
</html>
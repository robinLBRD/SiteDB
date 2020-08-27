<?php
if (!empty($_POST)) {

    require '../HTML/Function.php';
    $errors = array();
    require_once '../HTML/db.php';

    if (empty($_POST["NomComplet"]) || !preg_match("/^[a-zA-Z0-9_ ]+$/", $_POST["NomComplet"])) {

        $errors["Nom"] = "Votre pseudo est invalide ! (alphanumérique)";
    } else {
        $req = $pdo->prepare("SELECT idInscription FROM inscription WHERE nomComplet = ?");
        $req->execute([$_POST["NomComplet"]]);
        $user = $req->fetch();
        if ($user) {
            $errors["nomComplet"] = "Ce nom est déjà pris";
        }
    }

    if (empty($_POST["Email"]) || !filter_var($_POST["Email"], FILTER_VALIDATE_EMAIL)) {

        $errors["Email"] = "Votre email est invalide ! (alphanumérique)";
    } else {
        $req = $pdo->prepare("SELECT idInscription FROM inscription WHERE email = ?");
        $req->execute([$_POST["Email"]]);
        $user = $req->fetch();
        if ($user) {
            $errors["email"] = "Cet email est déjà utilisé pour un autre compte";
        }
    }

    if (empty($_POST["Password"]) || $_POST["Password"] != $_POST["PasswordRetape"]) {

        $errors["password"] = "Vous devez entrer un mot de passe valide (alphanumérique) ou les mots de passe ne sont pas similaires !";
    }

    if (empty($_POST["Titulaire"]) || !preg_match("/^[a-zA-Z0-9' ]+$/", $_POST["Titulaire"])) {

        $errors["Titulaire"] = "Votre objet est invalide ! (alphanumérique)";
    }

    if (empty($_POST["Numero"]) || !preg_match("/^[0-9]+$/", $_POST["Numero"])) {

        $errors["Numero"] = "Votre message est invalide ! (Chiffre seulement)";
    }

    if (empty($errors)) {
        $rep = $pdo->prepare("INSERT INTO inscription SET nomComplet = ?, email = ?, password = ?, passwordRetape = ?, titulaire = ?, numero = ?");
        $password = crypt($_POST["Password"]);
        $passwordRetape = crypt($_POST["PasswordRetape"]);
        //$password = password_hash($_POST["Password"], PASSWORD_BCRYPT);
        //$password = password_hash($_POST["PasswordRetape"], PASSWORD_BCRYPT);
        $rep->execute([$_POST["NomComplet"], $_POST["Email"], $password, $passwordRetape, $_POST["Titulaire"], $_POST["Numero"]]);
    }
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link href="../CSS/adminlte.css" rel="stylesheet" type="text/css"/>
        <title>Games Seek : VIP Enregistrer</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <!-- icheck bootstrap -->
        <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
        <!-- Google Font: Source Sans Pro -->
        <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    </head>
    <body class="hold-transition register-page">
        <div class="register-box">
            <div class="register-logo">
                <a href="../Accueil.php"><b>GamesSeek</b>VIP</a>
            </div>
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

            <div class="card">
                <div class="card-body register-card-body zebi">
                    <p class="login-box-msg">Enregistrer un nouveau membre</p>
                    <form action="" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="NomComplet" placeholder="Nom complet" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-user"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="email" class="form-control" name="Email" placeholder="Email" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-envelope"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="Password" placeholder="Mot de Passe" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" name="PasswordRetape" placeholder="Retaper le mot de passe" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="Titulaire" placeholder="Titulaire de la carte" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="number" class="form-control" name="Numero" placeholder="Numéro de carte (16 chiffres)" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <span class="red">*</span>Date d'expiration : 
                            <select required="required">
                                <option value="mois">1</option>
                                <option value="mois">2</option>
                                <option value="mois">3</option>
                                <option value="mois">4</option>
                                <option value="mois">5</option>
                                <option value="mois">6</option>
                                <option value="mois">7</option>
                                <option value="mois">8</option>
                                <option value="mois">9</option>
                                <option value="mois">10</option>
                                <option value="mois">11</option>
                                <option value="mois">12</option>
                            </select>
                            <select required="required">
                                <option value="annee">2019</option>
                                <option value="annee">2020</option>
                                <option value="annee">2021</option>
                                <option value="annee">2022</option>
                                <option value="annee">2023</option>
                                <option value="annee">2024</option>
                                <option value="annee">2025</option>
                                <option value="annee">2026</option>
                                <option value="annee">2027</option>
                                <option value="annee">2028</option>
                                <option value="annee">2029</option>
                                <option value="annee">2030</option>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <span class="red">*</span>Cryptogramme visuel :
                            <input type="number" class="form-control" placeholder="Cryptogramme visuel (3 chiffres)" required="required">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <span class="fas fa-lock"></span>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-8">
                                <div class="icheck-primary">
                                    <input type="checkbox" id="accepte" name="therme" value="accepter" required="required">
                                    <label for="accepte">
                                        J'accepte le <a href="Criteres.php">payement</a>.
                                    </label>
                                </div>
                            </div>
                            <!-- /.col -->
                            <div class="col-4">
                                <button type="submit" class="btn btn-primary btn-block btn-flat">Enregistrer</button>
                            </div>
                            <!-- /.col -->
                        </div>
                    </form>

                    <div class="social-auth-links text-center">
                        <p>- OU -</p>
                    </div>
                    <a href="login.php" class="text-center">Je suis déjà membre</a>
                </div>
            </div>
        </div>
    </body>
</html>

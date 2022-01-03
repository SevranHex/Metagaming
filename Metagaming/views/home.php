<?php

    session_start();
    
    if(isset($_POST['register'])) {

        // Les 2 regex pour la connection a un compte existant
        $regexPseudo = '/^[A-Za-z]{1}[A-Z-a-z0-9ÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç]{6-31}/' ; // Lettres et caractères spéciaux uniquement, de 6 à 31
        $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{7,}$/' ; // 7 caractères minimum, dont une minuscule, une majuscule, un chiffre et un caractère spécial

        $connectionErrorList = [] ; // La liste des erreurs de saisie pour la connexion, regroupées dans un tableau

        // Confirmation du regex pour le pseudo de l'utilisateur

        if(!empty($_POST['pseudo'])) {
            if(preg_match($regexPseudo, $_POST['pseudo'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
            } else {
                $connectionErrorList['pseudo'] = 'Veuillez vérifier votre pseudo et l\'écrire à nouveau';
            }
        }

        // Confirmation du regex pour le mot de passe de l'utilisateur

        if(!empty($_POST['password'])) {
            if(preg_match($regexPassword, $_POST['password'])) {
                $password = htmlspecialchars($_POST['password']);
            } else {
                $connectionErrorList['password'] = 'Le mot de passe indiqué ne correspond pas au pseudo écrit';
            }
        }

    }
?>



<!DOCTYPE html>
<html>

    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="assets/connexion.css" rel="stylesheet">
    </head>

<body>

    <div class="container-fluid">

    <div>

    </div>

    <div class="container">
        <form action="inscription.php">

            <div class="row">

                <h1 style="text-align : center">Rentrez votre pseudo et mot de passe ou utilisez un réseau social</h1>

            <div class="vl">
                <span class="vl-innertext">ou</span>
            </div>

            <div class="col">
                <a href="" class="fb btn">
                    <i class="fa fa-facebook fa-fw"></i> Se connecter avec Facebook
                </a>

                <a href="" class="twitter btn">
                    <i class="fa fa-twitter fa-fw"></i> Se connecter avec Twitter
                </a>

                <a href="" class="google btn">
                    <i class="fa fa-google fa-fw"></i> Se connecter avec Google+
                </a>
            </div>

            <div class="col">
                <input type="text" name="username" value="<?= isset($pseudo) ? $pseudo : '' ?>" placeholder="Pseudo">
                    <?php
                        if(!empty($connectionErrorList['pseudo'])) {
                            ?><p><small><?='<span style="color:#FF0000">'?><?= $connectionErrorList['username'] ?></small></p>
                        <?php
                        }
                        ?>

                <input type="password" name="password" value="<?= isset($password) ? $password : '' ?>" placeholder="Mot de passe">
                    <?php
                        if(!empty($connectionErrorList['password'])) {
                            ?><p><small><?='<span style="color:#FF0000">'?><?= $connectionErrorList['password'] ?></small></p>
                        <?php
                        }
                        ?>
                
                <input type="submit" value="Se connecter" name="register">
            </div>
            
            </div>
        </form>
    </div>

    <div class="bottom-container">
        <div class="row">
            <div class="col">
            <a href="" style="color:white" class="btn">Créer son compte</a>
            </div>
            <div class="col">
            <a href="" style="color:white" class="btn">Vous avez oublié votre mot de passe ?</a>
            </div>
        </div>
    </div>

    </body>

</html>
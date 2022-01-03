<?php

    //Condition si formulaire validé

    if(isset($_POST['inscription'])){
    $infos = [$_POST];

    include 'errorTests.php';


    }
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Votre compte</title>
</head>
<body>
    <h1>Votre compte</h1>
    <?php if(!isset($_POST['inscription']))?>
    <div class="container-fluid mainContainer">
        <div class="row row-cols-2">

            <div class="row justify-content-center">
                <div class="col">
                    Colonne
                </div>
            
            </div>

            <div class="row justify-content-center">
                <div class="col">

                    <h2 class="h3">Gestion de votre compte</h2>

                    <form action="" method="POST">

                        <label>Prénom</label>
                        <input type="text" name="firstName" value="<?= isset($firstName) ? $firstName : '' ?>">
                        <p><?= isset($_POST['inscription']) && isset($errorList['firstName']) ? $errorList['firstName'] : '' ?></p>

                        <label>Date de naissance</label>
                        <input type="text" name="birthDate" value="<?= isset($birthDate) ? $birthDate : '' ?>">
                        <p><?= isset($_POST['inscription']) && isset($errorList['birthDate']) ? $errorList['birthDate'] : '' ?></p>

                        <label>Adresse mail</label>
                        <input type="text" name="email" value="<?= isset($email) ? $email : '' ?>">
                        <p><?= isset($_POST['inscription']) && isset($errorList['email']) ? $errorList['email'] : '' ?></p>

                        <label>Pseudo</label>
                        <input type="text" name="pseudo" value="<?= isset($pseudo) ? $pseudo : '' ?>">
                        <p><?= isset($_POST['inscription']) && isset($errorList['pseudo']) ? $errorList['pseudo'] : '' ?></p>

                        <label>Mot de passe</label>
                        <input type="text" name="password" value="<?= isset($password) ? $password : '' ?>">
                        <p><?= isset($_POST['inscription']) && isset($errorList['password']) ? $errorList['password'] : '' ?></p>

                        <div>
                            <input class="mt-4 subAccountButton" type="submit" name="inscription" value="Modifier son compte">
                        </div>

                    </form>
                </div>

            </div>

        </div>
    </div>
</body>
</html>
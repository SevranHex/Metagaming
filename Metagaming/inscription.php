<?php

    session_start();

    if(isset($_POST['register'])) {

        // Les 3 regex pour les infos du compte user
        $regexNames = '/^[A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç][A-Za-zÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç\-\s\']*$/' ;
        $regexMail = '/^[A-Za-z0-9-ÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç._%+-]{1,64}@(?:[A-Z0-9-]{1,40}\.){1,125}[A-Z]{2,15}*$/' ;
        $regexPseudo = '/^[A-Za-z]{1}[A-Z-a-z0-9ÉÈËéèëÀÂÄàäâÎÏïîÔÖôöÙÛÜûüùÆŒÇç]{6-31}/' ;
        $regexPassword = '/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{7,}$/' ; // 7 caractères minimum, dont une minuscule, une majuscule, un chiffre et un caractère spécial

        $formErrorList = []; // La liste des erreurs de saisie, regroupées dans un tableau

        // Confirmation du regex pour le nom de famille de l'utilisateur
        if(!empty($_POST['lastname'])) {
            if(preg_match($regexNames, $_POST['lastname'])) {
                $lastname = htmlspecialchars($_POST['lastname']);
            } else {
                $formErrorList['lastname'] = 'Votre nom ne peut contenir que des lettres et des caractères spéciaux';
            }
        } else {
            $formErrorList['lastname'] = 'Votre nom est obligatoire pour créer un compte';
        }

        // Confirmation du regex pour le prénom de l'utilisateur
        if(!empty($_POST['firstname'])) {
            if(preg_match($regexNames, $_POST['firstname'])) {
                $firstname = htmlspecialchars($_POST['firstname']);
            } else {
                $formErrorList['firstname'] = 'Votre prénom ne peut contenir que des lettres et des caractères spéciaux';
            }
        } else {
            $formErrorList['firstname'] = 'Votre prénom est obligatoire pour créer un compte';
        }

        // Confirmation de l'adresse mail de l'utilisateur
        if(!empty($_POST['mail'])) {
            if(preg_match($regexMail, $_POST['mail'])) {
                $mail = htmlspecialchars($_POST['mail']);
            } else {
                $formErrorList['mail'] = 'Veuillez vérifier votre adresse mail';
            }
        } else {
            $formErrorList['mail'] = 'Votre adresse mail est obligatoire pour créer un compte';
        }

        // Confirmation du regex pour le pseudo de l'utilisateur
        if(!empty($_POST['pseudo'])) {
            if(preg_match($regexPseudo, $_POST['pseudo'])) {
                $pseudo = htmlspecialchars($_POST['pseudo']);
            } else {
                $formErrorList['pseudo'] = 'Votre pseudo ne peut contenir que des lettres et des caractères spéciaux';
            }
        } else {
            $formErrorList['pseudo'] = 'Vous devez choisir un pseudo pour créer un compte';
        }

    }
?>



<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Créer son compte</title>
    <link rel="stylesheet" type="text/css" href="assets/inscription.css">
</head>

<body>
    <div class="container">
        <form method="post" action=""> <!-- Le formulaire demande les infos : nom, prénom, adresse mail et pseudo et les mentions légales à accepter -->

        <div class="">
            <h1 style="text-align : center">Rejoindre la communauté ne vous prendra que quelques instants</h1>

            <p><label for="lastname">Votre nom</label>
            <input type="text" value="<?= isset($lastname) ? $lastname : '' ?>" name="lastname"> <!-- Si la valeur name est indiquée, elle est choisie, sinon et si le formulaire est renvoyé, elle est vide -->
            <?php
                if(!empty($formErrorList['lastname'])) {
                    ?><p><small><?='<span style="color:#FF0000">'?><?= $formErrorList['lastname'] ?></small></p> <!-- En cas d'erreur, le message d'erreur correspondant est indiqué -->
                <?php
                }
                ?>
            </p>
        </div>

        <div class="">
            <p><label for="firstname">Votre prénom</label>
            <input type="text" value="<?= isset($firstname) ? $firstname : '' ?>" name="firstname">
            <?php
                if(!empty($formErrorList['firstname'])) {
                    ?><p><small><?='<span style="color:#FF0000">'?><?= $formErrorList['firstname'] ?></small></p>
                <?php
                }
                ?>
            </p>
        </div>

        <div class="">
            <p><label for="mail">Votre adresse mail</label>
            <input type="text" value="<?= isset($mail) ? $mail : '' ?>" name="mail">
            <?php
                if(!empty($formErrorList['mail'])) {
                    ?><p><small><?='<span style="color:#FF0000">'?><?= $formErrorList['mail'] ?></small></p>
                <?php
                }
                ?>
            </p>
        </div>

        <div class="">
            <p><label for="pseudo">Votre pseudo (vous pourrez le modifier plus tard)</label>
            <input type="text" value="<?= isset($pseudo) ? $pseudo : '' ?>" name="pseudo">
            <?php
                if(!empty($formErrorList['pseudo'])) {
                    ?><p><small><?='<span style="color:#FF0000">'?><?= $formErrorList['pseudo'] ?></small></p>
                <?php
                }
                ?>
            </p>
        </div>
        </div>
            <input type="checkbox" name="legalMentions" value="accepted" required><span>En remplissant cette feuille informative, j'accepte les conditions générales de vente.</span> <!-- Les mentions légales doivent obligatoirement être acceptées pour valider le formulaire -->
            <p><input type="submit" value="Créer mon compte" name="register"></p>
        </form>

</body>
</html>
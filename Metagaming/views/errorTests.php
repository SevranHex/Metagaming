<?php
//Création des Regex
$firstnameRegex = '/^[A-ZÀ-ÖØ][A-Za-zÀ-ÖØ-öø-ÿ\-\']*$/';
$birthdateRegex = '/^(([0-2][0-9])||([3][0-1]))[\/](([1][0-2])||([0][0-9]))[\/](([1][9][0-9][0-9])||([2][0](([0-1][0-9])||([2][0-1]))))$/';
$mailRegex = '/^([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$/';
$pseudoRegex = '/^([a-zA-Z0-9]{4,25})$/';
$passwordRegex = '/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[@#$%^&!-+=()])(?=\\S+$).{7,30}$/' ;


//Création du tableau vide de listes d'erreurs

$errorList = [];

// Définition des erreurs du champ 'prénom'

if(!empty($_POST['firstName'])){ 
    if(!preg_match($firstnameRegex, $_POST['firstName'])){
        $errorList['firstName'] = 'Merci d\'entrer un prénom composé d\'une majuscule, de lettres caractères accentués, tirets et/ou apostrophes.';
    } else {
        $firstName = htmlspecialchars($_POST['firstName']);
    }
} else {
    $errorList['firstName'] = 'Veuillez entrer votre prénom.';
}

// Définition des erreurs du champ 'date de naissance'

if(!empty($_POST['birthDate'])){ 
    if(!preg_match($birthdateRegex, $_POST['birthDate'])){
        $errorList['birthDate'] = 'Merci d\'entrer une date de naissance au format jj/mm/aaaa.';
    } else {
        $dateArray = explode('/', $_POST['birthDate']);
        if(checkdate($dateArray[1], $dateArray[0], $dateArray[2])){
        $birthDate = htmlspecialchars($_POST['birthDate']);
        } else {
            $errorList['birthDate'] = 'Merci d\'entrer une date existante.';
        }
    }
} else {
    $errorList['birthDate'] = 'Veuillez entrer votre date de naissance.';
}

// Définition des erreurs du champ 'email'

if(!empty($_POST['email'])){ 
    if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
        $errorList['email'] = 'Merci d\'entrer une adresse e-mail valide.';
    } else {
        $email = htmlspecialchars($_POST['email']);
    }
} else {
    $errorList['email'] = 'Veuillez entrer votre adresse e-mail.';
}

// Définition des erreurs du champ 'pseudo'

if(!empty($_POST['pseudo'])){ 
    if(!preg_match($pseudoRegex, $_POST['pseudo'])){
        $errorList['pseudo'] = 'Merci d\'entrer un pseudo composé d\'entre 4 et 25 caractères. Seuls les minuscules, majuscules et chiffres sont autorisés.';
    } else {
        $pseudo = htmlspecialchars($_POST['pseudo']);
    }
} else {
    $errorList['pseudo'] = 'Veuillez entrer votre pseudo.';
}

// Définition des erreurs du champ 'mot de passe'

if(!empty($_POST['password'])){ 
    if(!preg_match($passwordRegex, $_POST['password'])){
        $errorList['password'] = 'Merci d\'entrer un mot de passe composé d\'entre 7 et 30 caractères, ainsi que d\'au moins une minuscule, une majuscule et un caractère spécial.';
    } else {
        $password = htmlspecialchars($_POST['password']);
    }
} else {
    $errorList['password'] = 'Veuillez entrer votre mot de passe.';
}

?>
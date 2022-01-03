<?php
    // On appelle une seule fois les modèles nécessaires
    require_once 'models/users.php';

    // Si l'utilisateur n'est pas connecté, il est redirigé vers l'accueil
    if(!isConnected()){
        header('Location: index.php');
        exit;
    }

    $pseudo = isset($_SESSION['user']['pseudo']) ? $_SESSION['user']['pseudo'] : '';
    $mail = isset($_SESSION['user']['mail']) ? $_SESSION['user']['mail'] : '';

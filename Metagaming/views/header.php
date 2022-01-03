<?php 
require_once 'config.php';
require 'controllers/header-controller.php';
?>


<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@100&display=swap" rel="stylesheet">
    <link href="../style.css" rel="stylesheet">
    <title>Metagaming</title>
</head>

<body> <!-- Void  ordonne à la page de ne pas se recharger/changer malgré le lien -->

    <div id="mainMenu">
        <nav class="navbar navbar-expand-md navbar-dark bg-primary">
            <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">X</a> 
            <a class="navbar-brand" href="../controllers/index-controller.php">
                <img src="../images/logo-aphp.jpeg" alt="Logo des Hôpitaux des Paris" width="120">
            </a>
            <div class="collapse navbar-collapse" id="navbarDefault">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/index-controller.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/ajout-patient-controller.php">Ajouter un patient</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/liste-patients-controller.php">Afficher les patients</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/ajout-rendezvous-controller.php">Ajouter un rendez-vous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/liste-rendezvous-controller.php">Afficher les rendez-vous</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../controller/ajout-patient-rendezvous-controller.php">Ajouter un patient avec un rendez-vous</a>
                    </li>
                </ul>
            </div>
        </nav>
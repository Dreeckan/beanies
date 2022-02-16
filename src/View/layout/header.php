<?php
if (!isset($pageTitle)) {
    $pageTitle = "Bienvenue !";
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle; ?> - Mes beaux bonnets !</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="?page=home">Mes beaux bonnets</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="?page=home">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=list">Liste</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=cart">Panier</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="?page=contact">Contact</a>
                    </li>
                    <?php
                    if (isset($_SESSION['username'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=login"><?= $_SESSION['username']; ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=logout">Déconnexion</a>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link" href="?page=login">Connexion</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <?php
    if (isset($_GET['login']) && $_GET['login'] == "success") {
    ?>
        <div class="alert alert-success" role="alert">
            Vous êtes bien connecté !
        </div>
    <?php
    }
    if (isset($_GET['logout']) && $_GET['logout'] == "success") {
    ?>
        <div class="alert alert-success" role="alert">
            Vous êtes bien déconnecté !
        </div>
    <?php
    }
    ?>

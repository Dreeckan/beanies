<?php
$pageTitle = "Connexion";

require_once 'includes/header.php';

$errors = [];

if (isset($_POST['username'])) {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($password)) {
        $errors[] = 'Mot de passe vide';
    } elseif ($password != $defaultPassword) {
        $errors[] = 'Mot de passe erroné';
    }

    if (empty($username)) {
        $errors[] = 'Username vide';
    }

    if (empty($errors)) {
        $_SESSION['username'] = $_POST['username'];

        header('Location: index.php?login=success');
    }
}
?>

<?php

foreach ($errors as $error) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php
}

?>

<form action="" method="post">
    <div class="mb-3">
        <label for="username" class="form-label">Identifiant</label>
        <input type="text" class="form-control" id="username" name="username">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Mot de passe</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <button type="submit" class="btn btn-primary">Valider</button>
</form>

<?php
include 'includes/footer.php';
?>

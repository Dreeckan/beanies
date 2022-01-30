<?php
$pageTitle = "Connexion";

require_once 'includes/header.php';

if (isset($_POST['username'])) {
    $_SESSION['username'] = $_POST['username'];

    header('Location: index.php?login=success');
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

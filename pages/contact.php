<?php
$errors = [];
$subject = '';
$email = '';
$content = '';

if (isset($_POST['subject'])) {
    $subject = trim($_POST['subject']);

    if (empty($subject)) {
        $errors[] = "Veuillez entrer un sujet";
    } elseif (strlen($subject) <= 10) {
        $errors[] = "Veuillez entrer un sujet plus long (10 caractères minimum)";
    }
}

if (isset($_POST['email'])) {
    $email = trim($_POST['email']);

    if (empty($email)) {
        $errors[] = "Veuillez entrer un e-mail";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Veuillez entrer un e-mail valide";
    }
}

if (isset($_POST['content'])) {
    $content = trim($_POST['content']);

    if (empty($content)) {
        $errors[] = "Veuillez entrer un message";
    } elseif (strlen($content) <= 100) {
        $errors[] = "Veuillez entrer un message plus long (100 caractères minimum)";
    }
}

if (isset($_POST['content']) && empty($errors)) {
?>
    <div class="alert alert-success" role="alert">
        Message envoyé
    </div>
<?php
}

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
        <label for="subject" class="form-label">Sujet</label>
        <input type="text" class="form-control" id="subject" name="subject" value="<?= $subject; ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $email; ?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Votre message</label>
        <textarea class="form-control" id="content" name="content"><?= $content; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

<?php

foreach ($contact->getErrors() as $error) {
?>
    <div class="alert alert-danger" role="alert">
        <?= $error; ?>
    </div>
<?php
}

if ($contact->isSubmitted() && empty($contact->getErrors())) {
?>
    <div class="alert alert-success" role="alert">
        Message envoyé
    </div>
<?php
}

?>
<form action="" method="post">
    <div class="mb-3">
        <label for="subject" class="form-label">Sujet</label>
        <input type="text" class="form-control" id="subject" name="subject" value="<?= $contact->getSubject(); ?>">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Adresse e-mail</label>
        <input type="email" class="form-control" id="email" name="email" value="<?= $contact->getEmail(); ?>">
    </div>
    <div class="mb-3">
        <label for="content" class="form-label">Votre message</label>
        <textarea class="form-control" id="content" name="content"><?= $contact->getContent(); ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Envoyer</button>
</form>

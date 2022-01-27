<?php
require_once 'includes/header.php';
?>

<div class="d-flex justify-content-evenly">
    <?php
    $i = 0;
    foreach ($beanies as $id => $beanie) {
        $i++;
        if ($i > 3) {
            break;
        }

        // afficher un bonnet
    ?>
        <div class="card m-2">
            <img src="img/<?= $beanie['image'] ?>" class="card-img-top" alt="<?= $beanie['image'] ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $beanie['name']; ?></h5>
                <p class="card-text"><?= $beanie['description']; ?></p>
                <a href="#" class="btn btn-primary">Ajouter au panier</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="d-flex justify-content-evenly">
    <a href="list.php" class="btn btn-primary">Voir tous les produits</a>
</div>
<?php
include 'includes/footer.php';
?>

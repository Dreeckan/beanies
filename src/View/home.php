<div class="d-flex justify-content-evenly">
    <?php
    foreach ($beanies as $beanie) {
        // afficher un bonnet
    ?>
        <div class="card m-2">
            <img src="img/<?= $beanie->getImage() ?>" class="card-img-top" alt="<?= $beanie->getImage() ?>">
            <div class="card-body">
                <h5 class="card-title"><?= $beanie->getName(); ?></h5>
                <p class="card-text"><?= $beanie->getName(); ?></p>
                <a href="?page=cart&id=<?= $beanie->getId(); ?>" class="btn btn-primary">Ajouter au panier</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="d-flex justify-content-evenly">
    <a href="?page=list" class="btn btn-primary">Voir tous les produits</a>
</div>

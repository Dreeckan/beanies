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
                <a href="?page=cart&id=<?= $id; ?>" class="btn btn-primary">Ajouter au panier</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<div class="d-flex justify-content-evenly">
    <a href="?page=list" class="btn btn-primary">Voir tous les produits</a>
</div>

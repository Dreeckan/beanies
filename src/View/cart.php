<table class="table">
    <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nom</th>
            <th scope="col">Prix unitaire (TTC)</th>
            <th scope="col">Quantité</th>
            <th scope="col">Prix</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $total = 0.0;

        foreach ($cart->getContent() as $id => $quantity) {
            $beanie = $beanies[$id];
            $price = $beanie->getPrice() * $quantity;
            $total += $price;
        ?>
            <tr>
                <td scope="row">
                    <?= $id ?>
                </td>
                <td>
                    <?= $beanie->getName(); ?>
                </td>
                <td>
                    <?= formatPrice($beanie->getPrice()); ?>€
                </td>
                <td>
                    <a href="?page=cart&id=<?= $id; ?>">+</a>
                    <?= $quantity; ?>
                    <a href="?page=cart&id=<?= $id; ?>&mode=min">-</a>
                </td>
                <td>
                    <?= formatPrice($price); ?>€
                    <a href="?page=cart&id=<?= $id; ?>&mode=delete">Supprimer</a>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="4" align="right">
                Total à payer :
            </td>
            <td>
                <?= formatPrice($total); ?>€
            </td>
        </tr>
    </tbody>
</table>
<a class="btn btn-danger" href="?page=cart&mode=empty">Vider le panier</a>

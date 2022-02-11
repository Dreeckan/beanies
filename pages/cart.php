<?php

if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $cart = $_SESSION['cart'];

    $mode = 'plus';
    if (isset($_GET['mode'])) {
        $mode = $_GET['mode'];
    }

    if (!isset($cart[$id])) {
        $cart[$id] = 0;
    }

    switch ($mode) {
        case 'plus':
            $cart[$id]++;
            break;
        case 'min':
            $cart[$id]--;
            break;
        case 'delete':
            $cart[$id] = 0;
            break;
    }

    if ($cart[$id] <= 0) {
        unset($cart[$id]);
    }

    $_SESSION['cart'] = $cart;
    header('Location: ?page=cart');
} elseif (isset($_GET['mode']) && $_GET['mode'] == 'empty') {
    $_SESSION['cart'] = [];
    header('Location: ?page=cart');
}

?>

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
        foreach ($_SESSION['cart'] as $id => $quantity) {
            $beanie = $beanies[$id];
            $price = $beanie['price'] * $quantity;
            $total += $price;
        ?>
            <tr>
                <td scope="row">
                    <?= $id ?>
                </td>
                <td>
                    <?= $beanie['name']; ?>
                </td>
                <td>
                    <?= formatPrice($beanie['price']); ?>€
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

<?php

/**
 * @param float $price
 * @return float
 */
function withoutVAT(float $price): float
{
    // équivalent à $price / (1 + (20 / 100))
    return $price / 1.2;
}

/**
 * Convertit l'affichage d'un prix, au format français.
 * Ex: 12 => 12,00
 *
 * @param float $price
 * @return string
 */
function formatPrice(float $price): string
{
    return number_format($price, 2, ',', ' ');
}

/**
 * Affiche une ligne (table HTML) d'un tableau de bonnets
 *
 * @param int $id Identifiant (clé) du bonnet
 * @param array $beanie Les informations d'un bonnet
 */
function displayBeanieLine(int $id, array $beanie): void
{
    $color = 'blue';
    if ($beanie['price'] <= 12.0) {
        $color = 'green';
    }
?>
    <tr>
        <td>
            <?= $id; ?>
        </td>
        <td>
            <?= $beanie['name']; ?>
        </td>
        <td style="color: <?= $color; ?>;">
            <?= formatPrice(withoutVAT($beanie['price'])); ?>€
        </td>
        <td style="color: <?= $color; ?>;">
            <?= formatPrice($beanie['price']); ?>€
        </td>
        <td>
            <?= $beanie['description']; ?>
        </td>
        <td>
            <a href="?page=cart&id=<?= $id; ?>" class="btn btn-primary">
                Ajouter au panier
            </a>
        </td>
    </tr>
<?php
}
?>

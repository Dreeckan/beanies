<?php

use Model\Beanie;

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
 * @param Beanie $beanie Les informations d'un bonnet
 */
function displayBeanieLine(Beanie $beanie): void
{
    $color = 'blue';
    if ($beanie->getPrice() <= 12.0) {
        $color = 'green';
    }
?>
    <tr>
        <td>
            <?= $beanie->getId(); ?>
        </td>
        <td>
            <?= $beanie->getName(); ?>
        </td>
        <td style="color: <?= $color; ?>;">
            <?= formatPrice(withoutVAT($beanie->getPrice())); ?>€
        </td>
        <td style="color: <?= $color; ?>;">
            <?= formatPrice($beanie->getPrice()); ?>€
        </td>
        <td>
            <?= $beanie->getDescription(); ?>
        </td>
        <td>
            <a href="?page=cart&id=<?= $beanie->getId(); ?>" class="btn btn-primary">
                Ajouter au panier
            </a>
        </td>
    </tr>
<?php
}
?>

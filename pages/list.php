<?php

$beaniesFiltered = $beanies;
$minPrice = null;
$maxPrice = null;
$material = null;
$size = null;

if (!empty($_POST['minPrice'])) {
    $minPrice = floatval($_POST['minPrice']);

    $beaniesFiltered = array_filter($beaniesFiltered, function (Beanie $beanie) use ($minPrice) {
        return $beanie->getPrice() >= $minPrice;
    });
}

if (!empty($_POST['maxPrice'])) {
    $maxPrice = floatval($_POST['maxPrice']);

    $beaniesFiltered = array_filter($beaniesFiltered, function (Beanie $beanie) use ($maxPrice) {
        return $beanie->getPrice() <= $maxPrice;
    });
}

if (!empty($_POST['material'])) {
    $material = trim($_POST['material']);
    $beaniesFiltered = array_filter($beaniesFiltered, function (Beanie $beanie) use ($material) {
        return in_array($material, $beanie->getMaterials());
    });
}

if (!empty($_POST['size'])) {
    $size = trim($_POST['size']);
    $beaniesFiltered = array_filter($beaniesFiltered, function (Beanie $beanie) use ($size) {
        return in_array($size, $beanie->getSizes());
    });
}


?>
<form action="" method="post">
    <div class="mb-3">
        <label for="minPrice" class="form-label">Prix minimum</label>
        <input type="number" class="form-control" id="minPrice" name="minPrice" value="<?= $minPrice; ?>">
    </div>
    <div class="mb-3">
        <label for="maxPrice" class="form-label">Prix maximum</label>
        <input type="number" class="form-control" id="maxPrice" name="maxPrice" value="<?= $maxPrice; ?>">
    </div>
    <div class="mb-3">
        <label for="material" class="form-label">Matière</label>
        <select name="material" id="material">
            <option value="">Choisissez une matière</option>
            <?php
            foreach (Beanie::AVAILABLE_MATERIALS as $value => $name) {
            ?>
                <option value="<?= $value; ?>" <?php if ($value == $material) {
                                                    echo 'selected';
                                                } ?>>
                    <?= $name; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="size" class="form-label">Taille</label>
        <select name="size" id="size">
            <option value="">Choisissez une taille</option>
            <?php
            foreach (Beanie::AVAILABLE_SIZES as $name) {
            ?>
                <option value="<?= $name; ?>" <?php if ($name == $size) {
                                                    echo 'selected';
                                                } ?>>
                    <?= $name; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>
    <button type="submit">Filtrer</button>
</form>

<table>
    <thead>
        <tr>
            <th>Id</th>
            <th>Nom</th>
            <th>Prix HT</th>
            <th>Prix TTC</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php
        /** @var Beanie $beanie */
        foreach ($beaniesFiltered as $beanie) {
            displayBeanieLine($beanie);
        }
        ?>
    </tbody>
</table>

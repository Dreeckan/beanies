<?php
$beaniesFilter = new BeanieFilter($beanies, $_POST);

?>
<form action="" method="post">
    <div class="mb-3">
        <label for="minPrice" class="form-label">Prix minimum</label>
        <input type="number" class="form-control" id="minPrice" name="minPrice" value="<?= $beaniesFilter->getMinPrice(); ?>">
    </div>
    <div class="mb-3">
        <label for="maxPrice" class="form-label">Prix maximum</label>
        <input type="number" class="form-control" id="maxPrice" name="maxPrice" value="<?= $beaniesFilter->getMaxPrice(); ?>">
    </div>
    <div class="mb-3">
        <label for="material" class="form-label">Matière</label>
        <select name="material" id="material">
            <option value="">Choisissez une matière</option>
            <?php
            foreach (Beanie::AVAILABLE_MATERIALS as $value => $name) {
            ?>
                <option value="<?= $value; ?>" <?php if ($value == $beaniesFilter->getMaterial()) {
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
                <option value="<?= $name; ?>" <?php if ($name == $beaniesFilter->getSize()) {
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
        foreach ($beaniesFilter->getResult() as $beanie) {
            displayBeanieLine($beanie);
        }
        ?>
    </tbody>
</table>

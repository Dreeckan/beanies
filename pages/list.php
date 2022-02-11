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
        /** @var array $beanie */
        foreach ($beanies as $key => $beanie) {
            displayBeanieLine($key, $beanie);
        }
        ?>
    </tbody>
</table>

<?php
require_once 'variables.php';
require_once 'functions.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes beaux bonnets !</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Prix HT</th>
                <th>Prix TTC</th>
                <th>Description</th>
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
</body>

</html>

<?php
spl_autoload_register(function ($class) {
    require_once "../classes/$class.php";
});
require_once '../includes/config.inc.php';

use Model\Beanie;

$description = "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis a leo diam. Quisque lorem orci, accumsan quis dolor sed, gravida.";

// Images téléchargées sur https://www.headict.com/fr/101-bonnet
$beanies = [
    (new Beanie())
        ->setId(42)
        ->setName("Bonnet en laine")
        ->setDescription($description)
        ->setPrice(10.0)
        ->setImage('the-fjord-black.jpg')
        ->addMaterial(Beanie::MATERIAL_WOOL)
        ->addSize('S')
        ->addSize('M')
        ->addSize('L')
        ->addSize('XL')
        ->addSize('XXL'),
    (new Beanie())
        ->setId(12)
        ->setName("Bonnet en laine bio")
        ->setDescription($description)
        ->setPrice(14.0)
        ->setImage('the-uniform-low-red-clay.jpg')
        ->addMaterial(Beanie::MATERIAL_WOOL)
        ->addSize('M')
        ->addSize('L'),
    (new Beanie())
        ->setId(2)
        ->setName("Bonnet en laine et cachemire")
        ->setDescription($description)
        ->setPrice(20.0)
        ->setImage('merino-beanie-navy.jpg')
        ->addMaterial(Beanie::MATERIAL_WOOL)
        ->addMaterial(Beanie::MATERIAL_CASHMERE)
        ->addSize('S'),
    (new Beanie())
        ->setId(666)
        ->setName("Bonnet arc-en-ciel")
        ->setDescription($description)
        ->setPrice(12.0)
        ->setImage('the-yukon-brim-olive.jpg')
        ->addMaterial(Beanie::MATERIAL_SILK)
        ->addSize('L'),
];

$sql = 'INSERT INTO beanie (name, description, price, image, sizes, materials) VALUES (:name, :description, :price, :image, :sizes, :materials)';
$statement = $db->prepare($sql);

$name = null;
$description = null;
$price = null;
$image = null;
$sizes = null;
$materials = null;

$statement->bindParam(':name', $name, PDO::PARAM_STR);
$statement->bindParam(':description', $description, PDO::PARAM_STR);
$statement->bindParam(':price', $price, PDO::PARAM_INT);
$statement->bindParam(':image', $image, PDO::PARAM_STR);
$statement->bindParam(':sizes', $sizes, PDO::PARAM_STR);
$statement->bindParam(':materials', $materials, PDO::PARAM_STR);

foreach ($beanies as $beanie) {
    $name = $beanie->getName();
    $description = $beanie->getDescription();
    $price = $beanie->getPrice() * 100;
    $image = $beanie->getImage();
    $sizes = json_encode($beanie->getSizes());
    $materials = json_encode($beanie->getMaterials());

    $statement->execute();
}

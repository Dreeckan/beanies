<?php

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

$defaultPassword = 'toto';

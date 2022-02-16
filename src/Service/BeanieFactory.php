<?php

namespace Service;

use Model\Beanie;

class BeanieFactory
{
    public function create(array $beanieData): Beanie
    {
        $beanie = new Beanie();
        $beanie->setId($beanieData['id']);
        $beanie->setName($beanieData['name']);
        $beanie->setDescription($beanieData['description']);
        $beanie->setPrice($beanieData['price']);
        $beanie->setImage($beanieData['image']);

        if (is_string($beanieData['sizes'])) {
            $beanieData['sizes'] = json_decode($beanieData['sizes']);
        }
        $beanie->setSizes($beanieData['sizes']);
        if (is_string($beanieData['materials'])) {
            $beanieData['materials'] = json_decode($beanieData['materials'], true, 512, JSON_OBJECT_AS_ARRAY);
        }
        $beanie->setMaterials($beanieData['materials']);

        return $beanie;
    }
}

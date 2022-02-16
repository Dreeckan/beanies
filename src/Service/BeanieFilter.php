<?php

namespace Service;

use Model\Beanie;

class BeanieFilter
{
    protected array $beanies = [];

    protected ?float $minPrice = null;

    protected ?float $maxPrice = null;

    protected ?string $material = null;

    protected ?string $size = null;


    public function __construct(array $beanies, array $filters)
    {
        if (!empty($filters['minPrice'])) {
            $this->minPrice = floatval($filters['minPrice']);
        }
        if (!empty($filters['maxPrice'])) {
            $this->maxPrice = floatval($filters['maxPrice']);
        }
        if (!empty($filters['material'])) {
            $this->material = trim($filters['material']);
        }
        if (!empty($filters['size'])) {
            $this->size = trim($filters['size']);
        }

        $this->beanies = $this->apply($beanies);
    }


    public function apply(array $beanies): array
    {
        $minPrice = $this->getMinPrice();
        if ($minPrice) {
            $beanies = array_filter($beanies, function (Beanie $beanie) use ($minPrice) {
                return $beanie->getPrice() >= $minPrice;
            });
        }

        $maxPrice = $this->getMaxPrice();
        if ($maxPrice) {
            $beanies = array_filter($beanies, function (Beanie $beanie) use ($maxPrice) {
                return $beanie->getPrice() <= $maxPrice;
            });
        }

        $material = $this->getMaterial();
        if ($material) {
            $beanies = array_filter($beanies, function (Beanie $beanie) use ($material) {
                return in_array($material, $beanie->getMaterials());
            });
        }

        $size = $this->getSize();
        if ($size) {
            $beanies = array_filter($beanies, function (Beanie $beanie) use ($size) {
                return in_array($size, $beanie->getSizes());
            });
        }

        return $beanies;
    }

    public function getSize(): ?string
    {
        return $this->size;
    }

    public function getMaterial(): ?string
    {
        return $this->material;
    }

    public function getMaxPrice(): ?float
    {
        return $this->maxPrice;
    }

    public function getMinPrice(): ?float
    {
        return $this->minPrice;
    }

    public function getResult(): array
    {
        return $this->beanies;
    }
}

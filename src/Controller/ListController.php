<?php

namespace Controller;

use Service\BeanieFactory;
use Service\BeanieFilter;

class ListController extends AbstractController
{
    public function getContent(): array
    {
        $statement = $this->db->query('SELECT * FROM beanie ORDER BY price');
        $beaniesData = $statement->fetchAll();

        $beanieFactory = new BeanieFactory();
        $beanies = [];
        foreach ($beaniesData as $beanieData) {
            $beanies[] = $beanieFactory->create($beanieData);
        }

        $beaniesFilter = new BeanieFilter($beanies, $_POST);

        return [
            'beanies'       => $beanies,
            'beaniesFilter' => $beaniesFilter,
        ];
    }

    public function getFileName(): string
    {
        return 'list';
    }

    public function getPageTitle(): string
    {
        return 'Tous nos bonnets';
    }
}

<?php

namespace Controller;

use Service\BeanieFactory;

class HomeController extends AbstractController
{
    public function getContent(): array
    {
        /** @var PDOStatement $statement */
        $statement = $this->db->query('SELECT * FROM beanie ORDER BY price ASC LIMIT 0, 3');
        $beaniesData = $statement->fetchAll();

        $beanieFactory = new BeanieFactory();
        $beanies = [];
        foreach ($beaniesData as $beanieData) {
            $beanies[] = $beanieFactory->create($beanieData);
        }

        return [
            'beanies' => $beanies,
        ];
    }

    public function getFileName(): string
    {
        return 'home';
    }

    public function getPageTitle(): string
    {
        return 'Bienvenue !';
    }
}

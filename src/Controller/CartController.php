<?php

namespace Controller;

use Model\Cart;
use Service\BeanieFactory;

class CartController extends AbstractController
{
    public function getContent(): array
    {
        $cart = new Cart();

        $isCartModified = $cart->handle($_GET);
        if ($isCartModified) {
            header('Location: ?page=cart');
        }
        $id = null;
        $beanieFactory = new BeanieFactory();
        $statement = $this->db->prepare('SELECT * FROM beanie WHERE id = :id');
        $statement->bindParam(':id', $id);

        $beanies = [];
        foreach ($cart->getContent() as $id => $quantity) {
            $statement->execute();
            $beanieData = $statement->fetch();
            if (empty($beanieData)) {
                continue;
            }
            $beanies[$id] = $beanieFactory->create($beanieData);
        }

        return [
            'beanies' => $beanies,
            'cart'    => $cart,
        ];
    }

    public function getFileName(): string
    {
        return 'cart';
    }

    public function getPageTitle(): string
    {
        return 'Votre panier';
    }
}

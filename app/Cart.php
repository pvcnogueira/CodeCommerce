<?php
/**
 * Created by PhpStorm.
 * User: Pedro
 * Date: 03/02/2016
 * Time: 20:34
 */

namespace CodeCommerce;


class Cart
{

    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function add($id, $name, $price, $qtd = 1)
    {
        $this->items[$id] = [
                'qtd' => $qtd,
                'price' => $price,
                'name' => $name
        ];
    }

    public function remove($id)
    {
        unset($this->items[$id]);
    }

    public function all()
    {
        return $this->items;
    }

    public function getTotal()
    {
        $total = 0;
        foreach($this->items as $item) {
            $total += $item['qtd'] * $item['price'];
        }

        return $total;
    }


} 